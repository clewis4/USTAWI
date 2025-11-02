<?php

function checkAdminRole() {
    // Check if user is logged in and has admin role
    if (!isset($_COOKIE['user_role']) || $_COOKIE['user_role'] !== 'admin') {
        // Redirect to home with message
        header("Location: /USTAWI/index.php?message=Action not allowed");
        exit();
    }
}

?>
