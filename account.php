<?php
include "./backend/db.php";
// Check if cookie exists
if (isset($_COOKIE["username"])) {
  $username = $_COOKIE["username"];
}

$query = "SELECT * FROM users where name='$username'";
$result = mysqli_query($con, $query);
$loggedinuser = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOMEPAGE</title>
    <style>
      @import url(all.css);
    </style>
  </head>
  <body>
    <header
      style="
        position: fixed;
        top: 0;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.534);
      "
    >
      <!--HEAD NAVIGATION BAR-->
      <div class="navbar">
        <div class="logo">
          <a href="index.php"><i>Ustawi wa jamii</i></a>
        </div>
        <ul class="links">
          <li><a href="index.php">HOME</a></li>
          <li><a href="eventsList.php">EVENTS</a></li>
          <li><a href="contact.html">CONTACT US</a></li>
          <li><a href="about.html">ABOUT US</a></li>
          <li><a href="account.php" class="chosen_tab">ACCOUNT</a></li>
        </ul>
        <a href="join.html" class="action_button">JOIN US</a>
        <div class="toggle_button">
          <i class="fa-solid fa-bars">More</i>
        </div>
      </div>
      <!--DROPDOWN MENU WHEN SCREEN SIZE DECREASES-->
      <div class="dropdown_menu">
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="eventsList.php">EVENTS</a></li>
          <li><a href="contact.html">CONTACT US</a></li>
          <li><a href="about.html">ABOUT US</a></li>
          <li><a href="account.php" class="chosen_tab">ACCOUNT</a></li>
          <a href="join.html" class="action_button">JOIN US</a>
        </ul>
      </div>
    </header>
    <!--INFO ON THE BODY OF THE HOMEPAGE WITH IMAGES-->

    <main class="account_page">
      <div class="profile_container">
        <div>
          <img src="./images/avatar.png" alt="" />
        </div>
        <div class="user_details">
          <div>Name: <?php echo $loggedinuser['name']?></div>
          <div>Email: <?php echo $loggedinuser['email']?></div>
          <div>Role: <?php echo $loggedinuser['role']?></div>
          
        </div>
      </div>
    </main>

    <footer>
      <a href="/ustawi/linked%20files/index.php">Home</a>
      <a href="/ustawi/linked%20files/eventsList.php">Events</a>
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
