<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StaffManagement";

// Function to check if email exists in the database
function emailExists($email, $conn)
{
    $sql = "SELECT * FROM Staff WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = $_POST['email'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email is admin@asiatech.com
    if ($email == 'admin@asiatech.com') {
        // Redirect to admin/index.php
        header("Location: /EAP/admin/index.php");
        exit();
    } else {
        // Check if the email exists in the database (pseudo code)
        // Assuming you have a function called emailExists that checks the database
        if (emailExists($email, $conn)) {
            // Redirect to faculty/index.php
            file_put_contents('session.txt', $email);
            header("Location: /EAP/faculty/index.php");
            exit();
        } else {
            // Handle the case where the email does not exist
            header("Location: /EAP/admin/authentication/overlay/sign-in.php");
            exit();
        }
    }
}
?>