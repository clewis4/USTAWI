<?php
session_start();

// Remove all session variables
session_unset();

// Destroy the session
session_destroy();

// Optional: clear cookies if you set any
setcookie('user_id', '', time() - 3600, '/');
setcookie('username', '', time() - 3600, '/');

// Redirect to login page
header("Location: login.php");
exit;
?>
