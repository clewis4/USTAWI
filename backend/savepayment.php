<?php 

include_once './db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $event_id = $_POST['event_id'];
    $payer_id = $_POST['payer_id'];
    $transaction_id = $_POST['transaction_id'];

    

    $sql = "INSERT INTO payments (event_id, transaction_id, payer_id, amount) VALUES ('$event_id', '$transaction_id', '$payer_id', '$amount')";

    if (mysqli_query($con, $sql)) {
        echo "<h3>Your contribution has been received, Thank you!</h3>";
        // header("Location: ../eventsList.php");
        // exit();
    } else {
        echo "Error: " . mysqli_error($con); 
    }
}
?>
