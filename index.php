<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /USTAWI/login.html");
    exit;
}
// Set default value in case cookie doesn't exist
$username = "";

// Check if cookie exists
if (isset($_COOKIE["username"])) {
  $username = $_COOKIE["username"];
}

include_once './header.php';

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
   
    <!--INFO ON THE BODY OF THE HOMEPAGE WITH IMAGES-->
    <div class="information">
      <div class="info">
        <br />
        <img src="logo.jpeg" class="logo_img" />
        <ul type="none">
          <li class="words">
            We are a charity organization that works to improve the lives of
            people in need.<br />
            We believe that everyone deserves a chance to thrive, no matter
            their circumstances.
          </li>
          <li class="words">
            You are not alone. We are here to help you, your family and anyone
            around you in times of crisis and hardship.<br />
            We offer a range of services and programs that can assist you with
            your needs and goals.
          </li>
        </ul>
      </div>
      <div class="info">
        <br />
        <img src="student.jpeg" class="aim_img" />
        <ul type="none">
          <li class="words2">
            Our mission is to inspire and educate people to become active
            citizens and leaders.<br />
            We work to foster democracy, human rights, and peace in our society
            and around the world.<br /><br /><br /><br />
          </li>
        </ul>
      </div>
      <div class="info">
        <br />
        <img src="helping_hand.jpeg" class="abt_img" />
        <ul type="none">
          <li class="words1">
            Join our community of volunteers and help us spread hope and
            kindness.<br />
            Whether you have a few hours or a few days, you can use your skills
            and talents to make a positive impact on someone's life.
          </li>
        </ul>
      </div>
      <div class="info">
        <br />
        <img src="eating.jpeg" class="donation_img" />
        <ul type="none">
          <li class="words3">
            You can make a difference by donating to our cause.<br />
            Your generosity will help us provide essential services and support
            to our beneficiaries, such as food, water, education, health care,
            and more.<br /><br /><br /><br />
          </li>
        </ul>
      </div>

      <div class="info">
        <br />
        <img src="water.jpeg" class="join_img" />
        <ul type="none">
          <li class="words4">
            We invite you to explore our website and learn more about our work
            and vision.<br />
            You can also find out how to get involved, whether by donating,
            volunteering, fundraising, or advocating.
          </li>
        </ul>
      </div>
    </div>

    <footer class="footer">
      <a href="/ustawi/linked%20files/index.php">Home</a>
      <a href="/ustawi/linked%20files/eventsList.html">Events</a>
      <a href="/ustawi/linked%20files/about.html">About</a>
      <a href="/ustawi/linked%20files/contact">Contact us</a>


      <a href="/USTAWI/backend/users/logout.php">Logout</a>
    </footer>

    <!--
    <div class="mainbox">
        <main>
            <section id="hero">
                <h1><i>WELCOME</i></h1>
                
    
            </section>
        </main>
    </div>
-->

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
