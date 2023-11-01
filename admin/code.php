<?php

include('../config/db_config.php');
include('../functions/myfunctions.php');

if (isset($_POST['add_category_btn'])) {

  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $description = $_POST['description'];
  $meta_title = $_POST['meta_title'];
  $meta_description = $_POST['meta_description'];
  $meta_keywords = $_POST['meta_keywords'];
  $status = isset($_POST['status']) ? '1' : '0';
  $popular = isset($_POST['popular']) ? '1' : '0';


  $image = $_FILES['image']['name'];

  $path = "../uploads";

  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = time() . '.' . $image_ext;

  $cate_query = "INSERT INTO categories (name, slug, description, meta_title, meta_description, meta_keywords, status, popular, image)  
  VALUES ('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$popular', '$filename')";

  $cate_query_run = mysqli_query($con, $cate_query);

  if ($cate_query_run) {

    move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);

    redirect('add_category.php', 'Category added successfully');
    //
  } else {
    redirect('add_category.php', 'Something Went Wrong');
  }
} else if (isset($_POST['update_category_btn'])) {
  $category_id = $_POST['category_id'];
  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $description = $_POST['description'];
  $meta_title = $_POST['meta_title'];
  $meta_description = $_POST['meta_description'];
  $meta_keywords = $_POST['meta_keywords'];
  $status = isset($_POST['status']) ? '1' : '0';
  $popular = isset($_POST['popular']) ? '1' : '0';

  $new_image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];

  if ($new_image != "") {
    // $update_filename = $new_image;
    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $update_filename = time() . '.' . $image_ext;
  } else {
    $update_filename = $old_image;
  }

  $path = "../uploads";

  $update_query = "UPDATE `categories` SET `name`='$name',`slug`='$slug',`description`='$description',`status`='$status',`popular`='$popular',`image`='$update_filename',`meta_title`='$meta_title',`meta_description`='$meta_description',`meta_keywords`='$meta_keywords'  WHERE id='$category_id'";

  $update_query_run = mysqli_query($con, $update_query);

  if ($update_query_run) {
    if ($_FILES['image']['name'] != "") {
      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);

      if (file_exists("../uploads/" . $old_image)) {
        unlink("../uploads/" . $old_image);
      }
    }
    redirect("edit-category.php?id=$category_id", "Category Updated Successfully");
  } else {
    redirect("edit-category.php?id=$category_id", "Something Went Wrong");
  }
} else if (isset($_POST['delete_category_btn'])) {
  //
  $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

  $category_query = "SELECT * FROM `categories` WHERE `id`='$category_id' ";
  $category_query_run = mysqli_query($con, $category_query);
  $category_data = mysqli_fetch_array($category_query_run);
  $image = $category_data['image'];


  $delete_query = "DELETE FROM `categories` WHERE `id`='$category_id'";
  $delete_query_run = mysqli_query(
    $con,
    $delete_query
  );

  if ($delete_query_run) {

    if (file_exists("../uploads/" . $image)) {
      unlink("../uploads/" . $image);
    }

    redirect("category.php", "Category Deleted Successfully");
  } else {
    redirect("category.php", "Something Went Wrong  ");
  }
} else if (isset($_POST['add_product_btn'])) {
  //
  $category_id = $_POST['category_id'];

  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $small_description = $_POST['small_description'];
  $description = $_POST['description'];
  $original_price = $_POST['original_price'];
  $selling_price = $_POST['selling_price'];
  $qty = $_POST['qty'];
  $meta_title = $_POST['meta_title'];
  $meta_description = $_POST['meta_description'];
  $meta_keywords = $_POST['meta_keywords'];
  $status = isset($_POST['status']) ? '1' : '0';
  $trending = isset($_POST['trending']) ? '1' : '0';


  $image = $_FILES['image']['name'];

  $path = "../uploads";

  //NEW
  $flie = '';
  $flie_tmp = '';
  $location = "../uploads";
  $data = '';
  foreach ($_FILES['image']['name'] as $key => $val) {
    $file = $_FILES['image']['name'][$key];
    $file_tmp = $_FILES['image']['tmp_name'][$key];

    $image_ext = pathinfo($file, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    move_uploaded_file($file_tmp, $location . '/' . $filename);
    $data .= $filename . " ";
  }

  // $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  // $filename = time() . '.' . $image_ext;

  $products_query = "INSERT INTO `products`( `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`) VALUES ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$data','$qty','$status','$trending','$meta_title','$meta_keywords','$meta_description')";

  $products_query_run = mysqli_query($con, $products_query);

  if ($products_query_run) {
    // move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
    // move_uploaded_file($file_tmp, $location . $file);



    redirect('add_product.php', 'Product added successfully');
  } else {
    redirect('add_product.php', 'Something went wrong');
  }
} else if (isset($_POST['update_product_btn'])) {

  $category_id = $_POST['category_id'];
  $product_id = $_POST['product_id'];

  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $small_description = $_POST['small_description'];
  $description = $_POST['description'];
  $original_price = $_POST['original_price'];
  $selling_price = $_POST['selling_price'];
  $qty = $_POST['qty'];
  $meta_title = $_POST['meta_title'];
  $meta_description = $_POST['meta_description'];
  $meta_keywords = $_POST['meta_keywords'];
  $status = isset($_POST['status']) ? '1' : '0';
  $trending = isset($_POST['trending']) ? '1' : '0';

  $path = "../uploads";

  $new_image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];

  if ($new_image != "") {
    // $update_filename = $new_image;
    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $update_filename = time() . '.' . $image_ext;
  } else {
    $update_filename = $old_image;
  }

  $update_product_query = "UPDATE `products` SET `category_id`='$category_id',`name`='$name',`slug`='$slug',`small_description`='$small_description',`description`='$description',`original_price`='$original_price',`selling_price`='$selling_price',`image`='$update_filename',`qty`='$qty',`status`='$status',`trending`='$trending',`meta_title`='$meta_title',`meta_keywords`='$meta_keywords',`meta_description`='$meta_description' WHERE id='$product_id'";
  $update_product_query_run = mysqli_query($con, $update_product_query);

  if ($update_product_query_run) {
    if ($_FILES['image']['name'] != "") {
      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);

      if (file_exists("../uploads/" . $old_image)) {
        unlink("../uploads/" . $old_image);
      }
    }
    redirect("edit-product.php?id=$product_id", "Product Updated Successfully");
  } else {
    redirect("edit-product.php?id=$product_id", "Something Went Wrong");
  }
  //
} else if (isset($_POST['delete_product_btn'])) {
  //
  $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

  $product_query = "SELECT * FROM `categories` WHERE `id`='$product_id' ";
  $product_query_run = mysqli_query($con, $product_query);
  $product_data = mysqli_fetch_array($product_query_run);
  $image = $product_data['image'];


  $delete_query = "DELETE FROM `products` WHERE `id`='$product_id'";
  $delete_query_run = mysqli_query(
    $con,
    $delete_query
  );

  if ($delete_query_run) {

    if (file_exists("../uploads/" . $image)) {
      unlink("../uploads/" . $image);
    }

    // redirect("products.php", "Product Deleted Successfully");
  } else {
    // redirect("products.php", "Something Went Wrong  ");

  }
} else {
  header("Location: index.php");
}
