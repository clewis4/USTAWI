<?php 
require '../../db.php';

$query = "SELECT * FROM users";


$users = mysqli_query($con,$query);
// echo  $users;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>

  <style>table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}</style>

  <body>



    <table>
      <th>
        <tr>
          <td>Name</td>
          <td>Email</td>
          <td>Role</td>
          <td></td>
        </tr>
      </th>

      <tbody>

      <?php
      foreach($users as $user){    
      ?>
        <tr>
          <td><?php echo $user['name'] ?></td>
          <td><?php echo $user['email'] ?></td>
          <td><?php echo $user['role'] ?></td>

          <td>
            <form action="delete_user.php" method="post">
                <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
        </tr>

        <?php
          }
        ?>
      </tbody>
    </table>


    <a href="/ustawi/backend/users/form.html"> <button>Add User</button></a>

    <a href="/ustawi/backend/"> <button>Back</button></a>
   
  </body>
</html>
