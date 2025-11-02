<?php 

include_once '../../backend/db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; 

    $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";

    if (mysqli_query($con, $sql)) {
        header("Location: ./manage.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con); 
        exit();
    }
}

?>
