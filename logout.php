<?php
session_start(); // Start the session

// Check if the user is already logged in
if (!isset($_SESSION['user_id'])) {
     // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Destroy the session and unset session variables
session_unset();
session_destroy();

// Redirect to the login page
header("Location: index.php");
exit();
?>
