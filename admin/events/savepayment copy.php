<?php 

include_once '../../backend/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $event_id = $_POST['event_id'];
    $payer_id = $_POST['payer_id'];
    $transaction_id = $_POST['transaction_id'];

    $sql = "INSERT INTO payments (event_id, transaction_id, payer_id, amount) VALUES ('$event_id', '$transaction_id', '$payer_id', '$amount')";

    if (mysqli_query($con, $sql)) {
        header("Location: ../payments/manage.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con); 
    }
}
?>
