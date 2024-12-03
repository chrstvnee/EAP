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

// Check if ID is set
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // SQL query to delete the row
    $sql = "DELETE FROM staff WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();

// Redirect back to the main page
header("Location: index.php");
exit();
?>