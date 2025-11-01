<?php


/*  Syntax for the connection string is -> Server, username, password, database name 
**  Replace "jeff" with "root"
**  Replace "webmaster" then empty quotes
**  The above 👆️ are the default usernames & password for xampp
*/
$con = mysqli_connect("localhost:4306","root","","ustawi");

if(mysqli_connect_errno()) {
    echo "Unable to connect to database";
    exit();
}

?>