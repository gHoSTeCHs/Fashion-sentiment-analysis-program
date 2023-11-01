<?php
session_start();
include("config/db_config.php");
// $db_query = "SELECT * FROM `categories`";
// $categories = mysqli_query($con, $db_query);

if (!isset($_SESSION['auth'])) {
  header("Location: login.php");
  $_SESSION['message'] = "Login to continue";
}

function getAll($table)
{
  global $con;
  $query = "SELECT * FROM $table";
  return $query_run = mysqli_query($con, $query);
}


$categories = getAll("categories");

include('includes/header.php')
?>


<section class="main_section">
  <div class="container">
    <?php
    include('includes/navbar.php')
    ?>
    <div class="product_categories">
      <?php
      if (mysqli_num_rows($categories) > 0) {
        foreach ($categories as $item) {

      ?>
          <div class="product">

            <img src="./uploads/<?= $item['image'] ?>" alt="<?= $item['name'];  ?>">
            <a href="products.php?category=<?= $item['id']; ?>" class="item_name">
              <?= $item['name']; ?>
            </a>

            <p>
              <?= $item['description']; ?>
            </p>

          </div>
      <?php
        }
      } else {
        echo "No data Avaliable";
      } ?>
    </div>
  </div>
</section>
</body>

</html>