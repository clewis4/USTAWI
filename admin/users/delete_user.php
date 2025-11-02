<?php 
include_once '../../backend/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    $sql = "DELETE FROM users WHERE id = $user_id";

    if (mysqli_query($con, $sql)) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . mysqli_error($con);
    }

    // Redirect to the users.php page
    header("Location: ./manage.php");
    exit();
}
?>
