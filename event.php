<?php
include "../backend/db.php";
include_once './header.php';

if (isset($_GET['id'])) { // we R checking if there is an ID in the url so we use it to query
    $id = $_GET['id'];

    $query = "SELECT * FROM events WHERE id = $id";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 0) {
        echo "Event not found";
        return;
    }

    // Fetch event details
    $event = mysqli_fetch_array($result);
} else {
    echo "Unable to get event";
    return;
}



// Set default value in case cookie doesn't exist
$uid = "";

// Check if cookie exists
if (isset($_COOKIE["user_id"])) {
  $uid = $_COOKIE["user_id"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Details</title>
    <link rel="stylesheet" href="event.css">


<!-- 
  ####  === PAYPAL CREDENTIALS ===
  EMAIL: sb-kldyc29646927@personal.example.com
  PASSWPRD: bG666O9?
 -->

 <style>
  .formContainer{
    display:flex;
    justify-content: center;
    align-items: center;
  }

  
  #charity-payment-form input {
    border: 4px solid #6071D4;
  }
 </style>

    <script
      src="https://www.paypal.com/sdk/js?client-id=AVmT34JVM4WctD4Dh-n1LhOSH57x1fb-q-OZn6sX0mhnozCMLynwxkZddiNwCx9BuoUX54lGcl9b6Atx&enable-funding=venmo&currency=USD"
      data-sdk-integration-source="button-factory"
    ></script>
    <script type="text/javascript" src="./paypal.js"></script>
</head>

<body>
    <div class="event-details" style="margin-top: 90px">
        <div class="banner"  style="background-image: url(./images/eve25.avif);"></div>
        <div class="description">
            <h2><?php echo $event['name']; ?></h2>
            <p><?php echo $event['description']; ?></p>
        </div>
        <div class="event-date">
           This event will be held on <?php echo $event['date']; ?>
        </div>

       <div class='formContainer'>
       <form action="./backend/savepayment.php" method="POST" id="charity-payment-form">
          <label for="amount">Support Us with Any Amount</label>
          <input
            type="number"
            id="amount"
            name="amount"
            min="1"
            autocomplete="off"
            required
          />

          <input
            hidden
            type="number"
            id="payer_id"
            name="payer_id"
            value="<?php echo $uid; ?>"
            autocomplete="off"
          />

          <input
            hidden
            type="number"
            id="event_id"
            name="event_id"
            value="<?php echo $event['id']; ?>"
            autocomplete="off"
          />

          <input
            hidden
            type="text"
            id="transaction_id"
            name="transaction_id"
            autocomplete="off"
          />

          <!-- <button>Sub</button> -->
        </form>
       </div>
        
        <div class="support-button">
          <div id="smart-button-container">
            <div style="text-align: center">
              <div id="paypal-button-container"></div>
          </div>
       </div>
        <!-- Support Us with Any Amount -->
      </div>
    </div>
</body>

</html>
