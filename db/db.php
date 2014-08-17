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

function executeDB($qstr) {
  global $con, $dberror;
  if (!connectedDB()) {
    return null;
  }
  $result = mysqli_query($con, $qstr);
  if (!$result) {
    $dberror = mysqli_error($con);
    return null;
  }
  return $result;
}

function closeDB() {
 global $con;
 mysqli_close($con); 
}

function connectedDB() {
  global $con;
  if (!$con) {
    $dberror = 'DB connection has not been established.';
    return false;
  }
  return true;
}

include 'platforms.php';
include 'levels.php';
include 'problems.php';
include 'languages.php';
include 'users.php';
include 'submissions.php'

?>
