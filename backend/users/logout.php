<?php
session_start();     // Start the session to access session variables
session_unset();     // Remove all session variables
session_destroy();   // Destroy the session itself

// Redirect to the login page
header("Location: /USTAWI/index.php");
exit;
?>
