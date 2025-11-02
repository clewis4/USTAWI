<?php session_start(); 



// Set default value in case cookie doesn't exist
$username = "";

// Check if cookie exists
if (isset($_COOKIE["username"])) {
  $username = $_COOKIE["username"];
}
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
          <!-- <a href="/USTAWI/"><i>Ustawi wa jamii</i></a> -->
       <a href="/USTAWI/index.php"><i>Ustawi wa jamii</i></a>
        </div>
        <ul class="links">
          <!-- <li><a href="/USTAWI/" class="chosen_tab">HOME</a></li> -->
            <li><a href="/USTAWI/index.php" class="chosen_tab">HOME</a></li>
          <li><a href="eventsList.php">EVENTS</a></li>
               <?php if (isset($_SESSION['role']) && $_SESSION['role'] === "admin"): ?>
    <li><a href="/USTAWI/admin/events/form.php">Create Event</a></li>
<?php endif; ?>
          <li><a href="contact.html">CONTACT US</a></li>
          <li><a href="about.html">ABOUT US</a></li>
          <li><a href="account.php">ACCOUNT</a></li>
        </ul>

        <?php 
            if($username !== ''){               
                echo '<span style="color:#fff">'. $username.'</span>';
            } else {
                // If user ID is not set, display the "JOIN US" link
                echo '<a href="join.html" class="action_button">JOIN US</a>';
            }
        ?>

        <!-- <a href="join.html" class="action_button">JOIN US</a> -->
        <div class="toggle_button">
          <i class="fa-solid fa-bars">More</i>
        </div>
      </div>
      <!--DROPDOWN MENU WHEN SCREEN SIZE DECREASES-->
      <div class="dropdown_menu">
        <ul>
          <li><a href="/USTAWI/" class="chosen_tab">HOME</a></li>
          <li><a href="eventsList.php">EVENTS</a></li>
     
          <li><a href="contact.html">CONTACT US</a></li>
          <li><a href="about.html">ABOUT US</a></li>
          <li><a href="account.php">ACCOUNT</a></li>
          <?php 
            if($username !== ''){               
                echo $username;
            } else {
                // If user ID is not set, display the "JOIN US" link
                echo '<a href="join.html" class="action_button">JOIN US</a>';
            }
        ?>

        </ul>
      </div>
    </header>
    
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
