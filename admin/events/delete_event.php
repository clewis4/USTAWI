<?php 
include_once '../../backend/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = $_POST['event_id'];

    $sql = "DELETE FROM events WHERE id = $event_id";

   
    if (mysqli_query($con, $sql)) {
        echo "Event deleted successfully";
    } else {
        echo "Error deleting event: " . mysqli_error($con);
    }
} else {
   
    echo "Invalid request";
}

// Redirect to the manage.php page
header("Location: ./manage.php");
exit(); 
?>
