<?php 
include_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];

    // Use SQL placeholders to prevent SQL injection
    $sql = 'DELETE FROM users WHERE id = ?';

    // Create prepared statement object
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement preparation failed";
        exit();
    }

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "i", $user_id);

    // Actual execution of the SQL statement
    mysqli_stmt_execute($stmt);

    // Check if any row was affected
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . mysqli_error($con);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Redirect to the users.php page
    header("Location: ./manage.php");
    exit();
}
?>
