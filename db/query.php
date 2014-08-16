<?php

$con = null;
$dberror = '';
function connectDB($username, $password) {
  global $con;
  $con = mysqli_connect('localhost' ,$username, $password, 'progfarm');
  if (mysqli_connect_errno()) {
    $con = null;
    $dberror = mysqli_connect_error();
    return false;
  } else {
    return true;
  }
}

include 'platforms.php';
include 'levels.php';
include 'problems.php';
include 'users.php';
include 'submissions.php'

?>