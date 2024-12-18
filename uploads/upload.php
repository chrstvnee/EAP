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

    // Create directory for staff ID if it doesn't exist
    $target_dir = $root_path . "/EAP/uploads/" . $staff_id . "/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileType != "pdf" && $fileType != "doc" && $fileType != "docx") {
        echo "Sorry, only PDF, DOC & DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";

            // Insert into Documents table
            $stmt = $conn->prepare("INSERT INTO Documents (Staff_ID, Document_Name) VALUES (?, ?)");
            $stmt->bind_param("is", $staff_id, $_FILES["file"]["name"]);
            if ($stmt->execute()) {
                echo "Document record successfully saved.";
                header("Location: /EAP/faculty/attachments.php");
                exit();
            } else {
                echo "Error saving document record: " . $stmt->error;
            }
            $stmt->close();

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $conn->close();
}
?>