<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include DB connection (unchanged)
include_once '../db.php';

// Only accept POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
if (!captcha_is_valid($_POST['g-recaptcha-response'] ?? '')) { 
    echo "<script>alert('CAPTCHA verification failed.');</script>"; 
    exit(); 
}


    http_response_code(405);
    exit('Method not allowed');
}

// --- 1) Get and trim inputs
$name     = isset($_POST['name']) ? trim($_POST['name']) : '';
$email    = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$role     = isset($_POST['role']) ? trim($_POST['role']) : '';

// --- 2) Basic validation
$errors = [];
if ($name === '') {
    $errors[] = 'Name is required';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email is required';
}
if ($password === '' || strlen($password) < 8) {
    $errors[] = 'Password is required and must be at least 8 characters';
}

// If validation fails, show first error (you can render all instead)
if (!empty($errors)) {
    echo htmlspecialchars($errors[0], ENT_QUOTES, 'UTF-8');
    exit;
}

// --- 3) Hash password (never store plain text)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// --- 4) Use prepared statement to avoid SQL injection
// Note: ensure your users table has columns: name, email, password, role (role can be nullable)
try {
    if ($role !== '') {
        $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        if ($stmt === false) {
            throw new Exception('Prepare failed: ' . $con->error);
        }
        $stmt->bind_param('ssss', $name, $email, $hashedPassword, $role);
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        if ($stmt === false) {
            throw new Exception('Prepare failed: ' . $con->error);
        }
        $stmt->bind_param('sss', $name, $email, $hashedPassword);
    }

    // Execute
    if ($stmt->execute()) {
        $userId = $stmt->insert_id;

        // --- 5) Set cookies (HttpOnly). `secure` should be true in production (HTTPS).
        $cookieOptions = [
            'expires'  => time() + 86400, // 1 day
            'path'     => '/',
            'domain'   => '',    // default (current host)
            'secure'   => false, // set true when using HTTPS in production
            'httponly' => true,
            'samesite' => 'Lax'  // or 'Strict' depending on needs
        ];
        // PHP 7.3+ supports options array
        setcookie('user_id', (string)$userId, $cookieOptions);
        setcookie('username', $name, $cookieOptions);

        // Redirect safely and exit
        header('Location: ../../index.php');
        $stmt->close();
        $con->close();
        exit;
    } else {
        // Log the detailed error server-side, show generic to user
        error_log('DB execute error: ' . $stmt->error);
        echo 'Unable to create account at this time.';
        $stmt->close();
        $con->close();
        exit;
    }

} catch (Exception $e) {
    error_log('Registration error: ' . $e->getMessage());
    echo 'Server error';
    if (isset($stmt) && $stmt !== false) $stmt->close();
    $con->close();
    exit;
}
