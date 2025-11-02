<?php
session_start();

// If user not logged in → redirect (backup for safety)
if (!isset($_SESSION['username'])) {
    header("Location: login.php?message=Please log in first");
    exit;
}

// If user is NOT admin block access
if ($_SESSION['role'] !== "admin") {
    header("Location: index.php?message=Unauthorized! You do not have permission to access that page.");
    exit;
}
?>
