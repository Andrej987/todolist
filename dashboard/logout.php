<?php session_start() ?>

<?php

$_SESSION['email'] = null;
$_SESSION['password'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;

header("Location: ../index.php");

 ?>
