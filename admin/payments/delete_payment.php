<?php 
include_once '../../backend/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['payment_id'])) {
    $payment_id = $_POST['payment_id'];

    $sql = "DELETE FROM payments WHERE id = $payment_id";

    if (mysqli_query($con, $sql)) {
        echo "Payment deleted successfully";
    } else {
        echo "Error deleting payment: " . mysqli_error($con);
    }

    header("Location: ./manage.php");
    exit();
}
?>
