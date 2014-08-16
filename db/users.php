<?php

function getAllUsers() {
  global $con;
  if (!$con) {
    return null;
  }
  $qstr = 'SELECT * FROM users';
  $result = mysqli_query($con, $qstr);
  return $result;
}

function getUserByUsername($user_username) {
  global $con;
  if (!$con) {
    return null;
  }
  $qstr = 'SELECT * FROM users WHERE username=' . user_username;
  $result = mysqli_query($con, $qstr);
  return $result;
}

function getUserById($user_id) {
  global $con;
  if (!$con) {
    return null;
  }
  $qstr = 'SELECT * FROM users WHERE id=' . $user_id;
  $result = mysqli_query($con, $qstr);
  return $result;
}

?>