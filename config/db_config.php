<?php
// Database connection settings
$host = 'localhost';
$port = 3307;
$dbname = 'fashion_reviews';
$username = 'root';
$password = '';

$con = mysqli_connect($host, $username, $password, $dbname, $port);

if (!$con) {
  echo "!connected";
}

// test sql query
// $db_query = "SELECT * FROM `reviews`";
// $db_query_run = mysqli_query($con, $db_query);

// echo $db_query_run;
