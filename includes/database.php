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

?>
