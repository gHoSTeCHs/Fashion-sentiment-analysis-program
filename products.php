<?php

session_start();
include("config/db_config.php");

function getSlugActive($table, $id)
{
  global $con;
  $query = "SELECT * FROM $table WHERE category_id='$id'";
  return $query_run = mysqli_query($con, $query);
}
function getProduct($table, $id)
{
  global $con;
  $query = "SELECT * FROM $table WHERE id='$id'";
  return $query_run = mysqli_query($con, $query);
}

$category_id = $_GET['category'];
$category_data = getSlugActive("products", $category_id);
$product_data = mysqli_fetch_array($category_data);

include('includes/header.php');
?>


<section class="main_section">
  <div class="container">
    <?php
    include('includes/navbar.php')
    ?>
    <div class="product_categories">
      <?php
      if (mysqli_num_rows($category_data) > 0) {
        foreach ($category_data as $item) {
          $product = getProduct("products", $item['id']);
          $product_data = mysqli_fetch_array($product);
      ?>

          <div class="product">
            <img src="./uploads/<?= $item['image'] ?>" alt="<?= $item['name'];  ?>">
            <a href="productview.php?productId=<?= $item['id']; ?>" class="item_name">Details</a>

            <p>
              <?= $item['name']; ?>
            </p>


          </div>
      <?php
        }
      } else {
        echo "No Data Avaliable";
      } ?>
    </div>



  </div>
</section>

<script src="script.js"></script>