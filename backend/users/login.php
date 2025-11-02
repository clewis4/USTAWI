<?php
session_start();
include_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clean input
    $email = strtolower(trim($_POST['email']));
    $password = trim($_POST['password']);

    // Find user by email
    $stmt = $con->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $row['password'])) {


            setcookie('user_id', $row['id'], time() + (86400 * 1), "/"); // 1 day
            setcookie('username', $row['name'], time() + (86400 * 1), "/"); // 1 day
            // setcookie('user_role', $row['role'], time() + (86400 * 1), "/"); // 1 day
            // Store user role in cookie
setcookie("user_role", $row['role'], time() + (86400 * 1), "/", "", false, true);
 // Store session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['role'] = $row['role'];



           
         // Redirect to home page
            header("Location: /USTAWI/index.php");
            exit;
        } else {
            echo "<script>alert('Incorrect password!'); window.location.href='../../login.html';</script>";
            exit;
        }
    } else {
        echo "<script>alert('User not found!'); window.location.href='../../login.html';</script>";
        exit;
    }

    $stmt->close();
    
}
?>
