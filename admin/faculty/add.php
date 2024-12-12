<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "staffmanagement";

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
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
    $sql = "INSERT INTO staff (Name, Email, Department, Role, Contract, Date) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssssss", $name, $email, $department, $role, $contract, $date);

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
    header("Location: http://localhost/EAP/admin/faculties.php");
    exit();
}
?>