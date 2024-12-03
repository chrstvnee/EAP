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

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Delete related records in the appraisal table
        $sql = "DELETE FROM appraisal WHERE staff_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        // Delete the record in the staff table
        $sql = "DELETE FROM staff WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();

        // Commit the transaction
        $conn->commit();

        echo "Record deleted successfully";
    } catch (Exception $e) {
        // Rollback the transaction if an error occurs
        $conn->rollback();
        echo "Error deleting record: " . $e->getMessage();
    }
}

$conn->close();

// Redirect back to the main page
header("Location: http://localhost/EAP/admin/faculties.php");
exit();
?>