<<<<<<< HEAD
<?php
require '../../backend/db.php';
require '../../backend/auth.php';

// Check if user is admin
checkAdminRole();
=======
<?php 
require '../../backend/db.php';
>>>>>>> 4ef692d6f7b5cb14d0f3519961169cce39406bb6

$query = "SELECT * FROM events";

$events = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <style>
  
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}</style>
  <body>



    <table>
      <th>
        <tr>
          <td>Name</td>
          <td>Description</td>
          <td>Date</td>
          <td></td>
          <td></td>
        </tr>
      </th>

      <tbody>

      <?php
      foreach($events as $event){    
      ?>
        <tr>
          <td><?php echo $event['name'] ?></td>
          <td><?php echo $event['description'] ?></td>
          <td><?php echo $event['date'] ?></td>
          <td>
<<<<<<< HEAD
            <a href="/USTAWI/admin/events/update.php?id=<?php echo $event['id'] ?>"><button>Update</button></a>
=======
            <a href="/ustawi/fullstack/admin/events/update.php?id=<?php echo $event['id'] ?>"><button>Update</button></a>
>>>>>>> 4ef692d6f7b5cb14d0f3519961169cce39406bb6
          </td>

          <td>
            <form action="delete_event.php" method="post">
                <input type="hidden" name="event_id" value="<?php echo $event['id'] ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
        </tr>

        <?php
          }
        ?>
      </tbody>
    </table>

<<<<<<< HEAD
    <a href="/USTAWI/admin/events/form.html"> <button>Add event</button></a>

    <a href="/USTAWI/admin/"> <button>Back</button></a>
=======
    <a href="/ustawi/fullstack/admin/events/form.html"> <button>Add event</button></a>

    <a href="/ustawi/fullstack/admin/"> <button>Back</button></a>
>>>>>>> 4ef692d6f7b5cb14d0f3519961169cce39406bb6
  </body>
</html>
