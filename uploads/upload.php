<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $root_path = $_SERVER['DOCUMENT_ROOT'];
    $emailFile = $root_path . '/EAP/admin/authentication/data/session.txt';
    $email = trim(file_get_contents($emailFile));

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "StaffManagement";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get staff ID from email
    $stmt = $conn->prepare("SELECT ID FROM Staff WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($staff_id);
    $stmt->fetch();
    $stmt->close();

    if (!$staff_id) {
        die("Staff ID not found for the given email.");
    }

    // Temporary directory for uploaded files
    $tmp_dir = "tmp/";
    // Check if tmp folder exists, delete it
    if (is_dir($tmp_dir)) {
        array_map('unlink', glob("$tmp_dir/*.*"));
        rmdir($tmp_dir);
    }
    // Create tmp folder
    mkdir($tmp_dir);

    // Create directory for staff ID if it doesn't exist
    $target_dir = $root_path . "/EAP/uploads/" . $staff_id . "/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Accept multiple file uploads and save to tmp folder
    $uploadOk = 1;
    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
        $file_name = basename($_FILES["files"]["name"][$key]);
        $target_file = $tmp_dir . $file_name;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $fileSize = $_FILES["files"]["size"][$key];

        // Check file size
        if ($fileSize > 50 * 1024 * 1024) { // 50MB in bytes
            echo "Sorry, your file is too large. Maximum file size is 50MB.";
            $uploadOk = 0;
            break;
        }

        if (!move_uploaded_file($tmp_name, $target_file)) {
            echo "Sorry, there was an error uploading your file.";
            $uploadOk = 0;
            break;
        }
    }

    if ($uploadOk == 0) {
        echo "Sorry, your files were not uploaded.";
    } else {
        // Create a zip file of the tmp folder
        $zip = new ZipArchive();
        $zip_file = $target_dir . "documents_" . time() . ".zip";

        if ($zip->open($zip_file, ZipArchive::CREATE) !== TRUE) {
            echo "Sorry, there was an error creating the zip file.";
            $uploadOk = 0;
        } else {
            foreach (glob("$tmp_dir/*.*") as $file) {
                $zip->addFile($file, basename($file));
            }
            $zip->close();

            $category = $_POST['category'] ?? "Doctorate_Degree";
            $uploader_comments = $_POST['uploader_comments'] ?? "None";
            $custom_points = $_POST['custom_points'] ?? 0;
            $points = $_POST['points'] ?? 0;

            // Insert into Documents table
            $document_name = basename($zip_file);
            $stmt = $conn->prepare("INSERT INTO Documents (Staff_ID, Document_Name, Category, Uploader_Comments, Custom_Points, Points) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssii", $staff_id, $document_name, $category, $uploader_comments, $custom_points, $points);
            if ($stmt->execute()) {
                echo "Document record successfully saved.";
                header("Location: /EAP/faculty/attachments.php");
                exit();
            } else {
                echo "Error saving document record: " . $stmt->error;
            }
            $stmt->close();
        }
    }

    // Delete tmp folder
    array_map('unlink', glob("$tmp_dir/*.*"));
    rmdir($tmp_dir);

    $conn->close();
}
?>