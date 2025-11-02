<?php 

// Include the database connection file
include_once '../db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; 

    // Hashing the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password,role) VALUES ('$name','$email','$hashedPassword','$role')";


    if (mysqli_query($con, $sql)) {
  
      // Getting the user of the newly inserted user
      $userId = mysqli_insert_id($con);

       
      setcookie('user_id', $userId, time() + (86400 * 1), "/"); // 1 day
      setcookie('username', $name, time() + (86400 * 1), "/"); // 1 day
        
      header("Location: ../../index.php");
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }
      mysqli_close($con);
}
?>
