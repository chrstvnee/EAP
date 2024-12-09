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

// Get the ID from the query string
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the data for the selected ID
$sql = "SELECT * FROM appraisal WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

$stmt->close();
$conn->close();

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>