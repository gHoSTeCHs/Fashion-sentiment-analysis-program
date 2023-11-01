<?php

session_start();
include('config/db_config.php');

function getSlugActive($table, $id)
{
  global $con;
  $query = "SELECT * FROM $table WHERE id='$id'";
  return $query_run = mysqli_query($con, $query);
}
$product_id = $_GET['productId'];
$product = getSlugActive("products", $product_id);
$product_data = mysqli_fetch_array($product);

include('includes/header.php');
?>

<section class="main_section">
  <div class="container">
    <?php
    include('includes/navbar.php');
    ?>
    <div class="write_reviews">
      <div class="product_d">
        <div class="product_data">
          <div class="product_img">
            <img src="./uploads/<?= $product_data['image'] ?>" alt="<?= $product_data['name'];  ?>">
          </div>
          <div class="product_desc">
            <p class="product_name">
              <?= $product_data['name']; ?> <br>
            </p>
            <p class="product_company">
              <?= $product_data['small_description']; ?> <br>
            </p>
            <p class="product_description">
              <?= $product_data['description']; ?> <br>
            </p>
            <p class="product_price">
              $<?= $product_data['qty']; ?> <br>
            </p>


          </div>


        </div>

        <form action="auth/authcode.php" method="post" class="review_form">
          <p class="product_write">
            Write your review
          </p>
          <input type="text" hidden name="product" value="<?= $product_data['name'] ?>">
          <input type="text" hidden name="product_id" value="<?= $product_data['id'] ?>">
          <input required type="text" name="review" placeholder="Write your review"><br>
          <button class="submit_review_btn" type="submit" name="submit_review_btn">Submit</button>
        </form>
      </div>

    </div>
  </div>
</section>

<?php

?>