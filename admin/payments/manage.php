<?php 
require '../../backend/db.php';

$query = "SELECT * FROM payments";


$payments = mysqli_query($con,$query);
// echo  $payments;
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

  <h1>Payments</h1>

    <table>
      <th>
        <tr>
          <td>Payer</td>
          <td>Payment</td>
          <td>Event</td>
          <td>Amount </td>
          <td>Date</td>
          <td></td>
        </tr>
      </th>

      <tbody>

      <?php
      foreach($payments as $paym){    
      ?>
        <tr>
          <td><?php echo $paym['payer_id'] ?></td>
          <td><?php echo $paym['transacion_id'] ?></td>
          <td><?php echo $paym['event_id'] ?></td>
          <td><?php echo $paym['amount'] ?></td>
          <td><?php echo date('Y-m-d', strtotime($user['paid_on'])); ?></td>

          <td>
            <form action="delete_payment.php" method="post">
                <input type="hidden" name="payment_id" value="<?php echo $paym['id'] ?>">
                <button type="submit">Delete</button>
            </form>
        </td>
        </tr>

        <?php
          }
        ?>
      </tbody>
    </table>

    <!-- <a href="/ustawi/fullstack/admin/payments/manage.php"> <button>New Payment</button></a> -->

    <a href="/ustawi/fullstack/admin/payments"> <button>Back</button></a>
   
  </body>
</html>
