<?php

function register(){

  global $connection;

  if (isset($_POST['register'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    if (!empty($email) && !empty($password) && !empty($firstname) && !empty($lastname)) {


      $email = mysqli_real_escape_string($connection, $email);
      $password = mysqli_real_escape_string($connection, $password);
      $firstname = mysqli_real_escape_string($connection, $firstname);
      $lastname = mysqli_real_escape_string($connection, $lastname);
      $code = substr(md5(mt_rand()),0,15);

      $query = "INSERT INTO users (email, password, firstname, lastname, registration_date, last_login, status, saltCode) ";
      $query .= "VALUES('{$email}', '{$password}', '{$firstname}', '{$lastname}', now(), now(), false, '{$code}')";

      $register_user_query = mysqli_query($connection, $query);

      if (!$register_user_query) {
        die("QUERY FAILED" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
      }

      $message = "Vaš aktivacijski kod je ".$code."";
      $to= $email;
      $subject="Aktivacijski kod";
      $from = 'example@example.com';
      $body ="Aktivacijski kod je '.$code.' Molimo Vas kliknite <a href='verification.php?code=$code'>ovdje</a> kako bi aktivirali nalog.";
      $headers = "From:".$from;
      mail($to,$subject,$body,$headers);

      echo "Aktivacijski kod je poslan na Vaš email";
      echo "<br>";
      echo "Za aktivaciju kliknite <a href='verification.php?code=$code'>ovdje</a>";
    }

  }

}

function login(){
  if (isset($_POST['login'])) {

    global $connection;

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE email = '{$email}' ";
    $query .= "AND status = '1' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
      die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_array($select_user_query)) {

      // data from database, used for validation
      $db_id = $row['id'];
      $db_email = $row['email'];
      $db_password = $row['password'];
      $db_firstname = $row['firstname'];
      $db_lastname = $row['lastname'];

    }

    // validation

    if ($email !== $db_email && $password !== $db__password) {

      header("Location:  ../index.php");

    } else if ($email == $db_email && $password == $db_password){

      $_SESSION['id'] = $db_id;
      $_SESSION['email'] = $db_email;
      $_SESSION['user_firstname'] = $db_firstname;
      $_SESSION['user_lastname'] = $db_lastname;

      header("Location:  ../dashboard/index.php?user_id={$db_id}");
    } else {
      echo "<strong>Neuspješna prijava, molim vas, provjerite unos. </strong>";
    }

  }

}
?>
