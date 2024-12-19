<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StaffManagement";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $role = $_POST['role'];
    $contract = $_POST['contract'];
    $date = $_POST['date'];

    // Prepare an insert statement
    $sql = "INSERT INTO Staff (Name, Email, Department, Role, Contract, Date) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssssss", $name, $email, $department, $role, $contract, $date);

        // Execute the statement
        if ($stmt->execute()) {
            // Get the last inserted ID
            $staff_id = $stmt->insert_id;

            // Insert into Appraisal table
            $sql_appraisal = "INSERT INTO Appraisal (Staff_ID) VALUES (?)";
            if ($stmt_appraisal = $conn->prepare($sql_appraisal)) {
                $stmt_appraisal->bind_param("i", $staff_id);
                $stmt_appraisal->execute();
                $stmt_appraisal->close();
            } else {
                echo "Error: " . $conn->error;
            }

            // Redirect to faculties page after successful insertion
            header("Location: http://localhost/EAP/admin/faculties.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>