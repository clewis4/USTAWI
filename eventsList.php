<?php 

include "../backend/db.php";

$query = "SELECT * FROM events";

$allEvents=  mysqli_query($con,$query);

include_once './header.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Charity Events</title>
    <style>
      @import url(all.css);
    </style>
  </head>
  <body>
    
    <div class="events-container" style="margin-top: 90px">

    <?php
      foreach($allEvents as $event) {    
      ?>
      <div class="event-card">
        <img src="./images/eve2.avif" alt="Event 1" />
        <div class="content">
          <h3>
            <?php echo $event['name'] ?>
          </h3>
          <p></p>
          <div class="button-container">
            <a href="/ustawi/fullstack/event.php?id=<?php echo $event['id'] ?>" class="button">View Details</a>
          </div>
        </div>
      </div>

      <?php 
      }
      ?>
    </div>



    <footer class="footer">
      <a href="/ustawi/linked%20files/index.php">Home</a>
      <a href="/ustawi/linked%20files/eventsList.html">Events</a>
      <a href="/ustawi/linked%20files/about.html">About</a>
      <a href="/ustawi/linked%20files/contact">Contact us</a>
    </footer>
    <!--SCRIPT FOR ADDITIONAL MENU WHEN SCREEN SIZE DECREASES-->
    <script>
      const toggleBtn = document.querySelector(".toggle_button");
      const toggleBtnIcon = document.querySelector(".toggle_button i");
      const dropDownMenu = document.querySelector(".dropdown_menu");

      toggleBtn.onclick = function () {
        dropDownMenu.classList.toggle("open");
        const isOpen = dropDownMenu.classList.contains("open");

        toggleBtnIcon.classList = isOpen
          ? "fa-solid fa-xmark"
          : "fa-solid fa-bars";
      };
    </script>
  </body>
</html>
