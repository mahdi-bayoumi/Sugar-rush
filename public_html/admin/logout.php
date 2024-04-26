<?php
session_start();
    // Unset all session variables
    $_SESSION = array();

    // If the session is set, remove the session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 42000, '/');
    }
// Unset all session variables
session_unset();


    // Destroy the session
    session_destroy();

header("Location: ../index.php");
exit();
?>
