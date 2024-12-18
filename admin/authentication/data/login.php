<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email from the form
    $email = $_POST['email'];

    // Check if the email is admin@asiatech.com
    if ($email == 'admin@asiatech.com') {
        // Redirect to admin/index.php
        header("Location: /EAP/admin/index.php");
        exit();
    } else {
        // Check if the email exists in the database (pseudo code)
        // Assuming you have a function called emailExists that checks the database
        if (emailExists($email)) {
            // Redirect to faculty/index.php
            header("Location: /EAP/faculty/index.php?email=" . urlencode($email));
            exit();
        } else {
            // Handle the case where the email does not exist
            header("Location: /EAP/admin/authentication/overlay/sign-in.php");
            exit();
        }
    }
}

// Function to check if email exists in the database (pseudo code)
function emailExists($email)
{
    // Implement your database check here
    // Return true if email exists, false otherwise
    return false; // Placeholder
}
?>