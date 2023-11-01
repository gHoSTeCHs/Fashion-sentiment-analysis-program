<?php
include("config/db_config.php");

function getAll($table)
{
  global $con;
  $query = "SELECT * FROM $table";
  return $query_run = mysqli_query($con, $query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review Page</title>
  <link rel="stylesheet" href="reviewpage.css">
</head>

<body>
  <div class="review_form_ui">
    <form action="auth/authcode.php" method="POST" class="reviews_form">
      <select name="pro_reviews" id="" class="dropdown">
        <?php
        //
        $categories = getAll("products");
        //
        if (mysqli_num_rows($categories) > 0) {
          foreach ($categories as $item) {
            //
        ?>
            <!--  -->
            <option value="<?= $item["categories"] ?>"><?= $item["categories"] ?></option>
            <!--  -->
        <?php
          }
        } else {
          echo "No category avaliable";
        }
        ?>
      </select>

      <div>
        <label for="review">Write a review</label><br>
        <input id="review" name="review_content" type="text">
      </div>
      <button type="submit" name="review_submit_btn" class="submit_btn"> Submit review </button>
    </form>
  </div>

</body>

</html>