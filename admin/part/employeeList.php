<?php
// Database connection details
$host = "localhost"; // Change to your database host
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "staffmanagement"; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data
$sql = "SELECT ID, Name, Email, Department, Role, Contract, Date FROM staff"; // Replace 'users' with your table name
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode(array("data" => $data));

$conn->close();
?>