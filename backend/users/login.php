
<?php 
session_start();

include_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT name, id, password, role FROM users WHERE email = '$email'";

    // execution of the SQL statement
    $result = $con->query($sql);

    // this just means if there are no results from DB
    // Meaning the user could not be found
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($password, $row['password'])) {


            setcookie('user_id', $row['id'], time() + (86400 * 1), "/"); // 1 day
            setcookie('username', $row['name'], time() + (86400 * 1), "/"); // 1 day
            // setcookie('user_role', $row['role'], time() + (86400 * 1), "/"); // 1 day
            // Store user role in cookie
setcookie("user_role", $row['role'], time() + (86400 * 1), "/", "", false, true);

      $_SESSION['role'] = $row['role'];


            header("Location: ../../index.php");
        } else {
            echo "<script>alert('Invalid email or password!');</script>";
        }
    } else {
        echo "<script>alert('Invalid email or password!');</script>";
    }

    $con->close();
}
?>
