<?php

$db['db_host']= "localhost";
$db['db_user']= "root";
$db['db_password']= "";
$db['db_name']= "todo_db";

foreach ($db as $db_key => $db_value) {

define(strtoupper($db_key), $db_value);

}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$connection) {
  echo "Connection Failed";
}

if (isset($_GET['code'])) {

  $code = $_GET['code'];

  $query = "UPDATE users SET status = 1 WHERE saltCode = '{$code}' ";
  $update_query = mysqli_query($connection, $query);

  if (!$update_query) {
    die('QUERY FAILED' . mysqli_error($connection));
  }

  header("Location: index.php");
}

 ?>
