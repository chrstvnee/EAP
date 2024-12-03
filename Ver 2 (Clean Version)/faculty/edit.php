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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $role = $_POST['role'];
    $contract = $_POST['contract'];
    $date = $_POST['date'];

    // SQL query to update the row
    $sql = "UPDATE staff SET Name=?, Email=?, Department=?, Role=?, Contract=?, Date=? WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $name, $email, $department, $role, $contract, $date, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();

// Redirect back to the main page
header("Location: index.php");
exit();
?>