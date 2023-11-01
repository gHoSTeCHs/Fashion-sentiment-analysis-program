<div class="nav_area">
  <div class="logo">
    <h3> <a href="./index.php">FashRev</a> </h3>
  </div>
  <div class="site_pages">
    <ul class="nav_section">
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </div>
  <div class="profile_section">
    <ul class="login">
      <?php
      if (isset($_SESSION['auth'])) {
      ?>
        <li>
          <?php
          if ($_SESSION['auth_user']['role_as'] != 0) {
          ?>

            <a href=""><?= $_SESSION['auth_user']['name']; ?> </a>
          <?php
          } else {
          ?>
            <a href=""><?= $_SESSION['auth_user']['name']; ?>
            </a>
          <?php

          }
          ?>

        </li>
        <li>

          <a href=" ./logout.php">LOGOUT</a>
        </li>
      <?php


      } else {
      ?>
        <li>
          <a href="./register.php">REGISTER</a>
        </li>
        <li>
          <a href="./login.php" class="log_btn">LOGIN</a>
        </li>
      <?php
      }
      ?>
    </ul>
  </div>
</div>