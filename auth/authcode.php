<?php
session_start();
include("../config/db_config.php");

if (isset($_POST['signup_btn'])) {
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  $db_insert_query = "INSERT INTO `users`(`id`, `name`, `email`, `password`, `role_as`) VALUES ('[value-1]','$name','$email','$password','[value-5]')";

  //Check if mail exists
  $check_email_query = "SELECT email from `users` WHERE `email` = '$email'";
  $check_email_query_run = mysqli_query($con, $check_email_query);

  if (mysqli_num_rows($check_email_query_run) > 0) {
    $_SESSION['message'] = "Email is already in use";
  } else {
    $db_insert_query_run = mysqli_query($con, $db_insert_query);
    header("Location: ../index.php");
  }
} else if (isset($_POST['login_btn'])) {
  $email = mysqli_real_escape_string($con, $_POST['email']);

  $password = mysqli_real_escape_string($con, $_POST['password']);

  $login_query = "SELECT * from users WHERE email='$email' AND password='$password'";
  $login_query_run = mysqli_query($con, $login_query);

  if (mysqli_num_rows($login_query_run) > 0) {
    $_SESSION['auth'] = true;

    $userData = mysqli_fetch_array($login_query_run);

    $username = $userData['name'];
    $useremail = $userData['email'];
    $userid = $userData['id'];
    $role_as = $userData['role_as'];

    //Set user-session
    $_SESSION['auth_user'] = [
      'name' => $username,
      'email' => $useremail,
      'id' => $userid,
      'role_as' => $role_as
    ];

    //Assign user-role
    if ($role_as == 1) {
      $_SESSION['message'] = 'Logged in successfully';
      header('Location: ../admin/index.php');
    } else if ($role_as == 0) {
      $_SESSION['message'] = 'Logged in successfully';
      header('Location: ../index.php');
    }
  } else {
    $_SESSION['message'] = 'Invalid Credentials';
    header('Location: ../login.php');
  }
} else if (isset($_POST['login_btn'])) {
  $email = mysqli_real_escape_string($con, $_POST['email']);

  $password = mysqli_real_escape_string($con, $_POST['password']);

  $login_query = "SELECT * from users WHERE email='$email' AND password='$password'";
  $login_query_run = mysqli_query($con, $login_query);

  if (mysqli_num_rows($login_query_run) > 0) {
    $_SESSION['auth'] = true;

    $userData = mysqli_fetch_array($login_query_run);

    $username = $userData['name'];
    $useremail = $userData['email'];
    $userid = $userData['id'];
    $role_as = $userData['role_as'];

    // Auth user session
    $_SESSION['auth_user'] = [
      'name' => $username,
      'email' => $useremail,
      'id' => $userid,
      'role_as' => $role_as
    ];

    if ($role_as == 1) {
      $_SESSION['message'] = 'Welcome to Dashboard';
      header('Location: ../admin/index.php');
    } else {
      $_SESSION['message'] = 'Logged successfully';
      header('Location: ../index.php');
    }
  } else {
    $_SESSION['message'] = 'Invalid Credentials';
    header('Location: ../login.php');
  }
} else if (isset($_POST['submit_review_btn'])) {
  $product =  mysqli_real_escape_string($con, $_POST['product']);
  $review =  mysqli_real_escape_string($con, $_POST['review']);
  $product_id =  mysqli_real_escape_string($con, $_POST['product_id']);

  $db_insert_query = "INSERT INTO `reviews`(`id`, `product`, `review`) VALUES ('[value-1]','$product','$review')";

  $db_insert_query_run = mysqli_query($con, $db_insert_query);

  if ($db_insert_query_run) {
    header("Location: ../productview.php?productId=" . $product_id);
  } else {
    echo "Something went wrong";
  }
}
