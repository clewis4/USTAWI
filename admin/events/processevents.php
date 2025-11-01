<?php 

include_once '../../backend/db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $sql = "INSERT INTO events (name, description, date) VALUES ('$name', '$description', '$date')";

    if (mysqli_query($con, $sql)) {
        header("Location: ./manage.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con); 
    }
}
?>
