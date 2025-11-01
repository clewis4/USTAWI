<?php 

include_once '../db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $date = $_POST['date']; 

    $sql = "INSERT INTO events (name, description, date) VALUES ('$name','$description','$date')";


    if (mysqli_query($con, $sql)) {
        // echo "A new record has been created successfully";

        header("Location: ../../eventsList.php");
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }

      
      #disconnect
      mysqli_close($con);
}
?>
