<?php

function getAllUsers() {
  $qstr = 'SELECT * FROM users';
  return executeDB($qstr);
}

function getUserByUsername($user_username) {
  // do not call with user input
  $qstr = "SELECT * FROM users WHERE username = '$user_username'";
  return executeDB($qstr);
}

function getUserById($user_id) {
  $qstr = 'SELECT * FROM users WHERE id = ' . $user_id;
  return executeDB($qstr);
}

function addUser($username, $password, $name, $email, $privilege) {
  if (!connectedDB()) return false;
  global $con;
  $username = mysqli_real_escape_string($con, $username);
  $password = mysqli_real_escape_string($con, $password);
  $name = mysqli_real_escape_string($con, $name);
  $email = mysqli_real_escape_string($con, $email);
  $privilege = mysqli_real_escape_string($con, $privilege);
  $regtime = time();
  $salt = rand() . rand();

  $password = crypt($password, $salt);

  $qstr = "INSERT INTO users (username, password, salt, name, email, regtime) VALUES
    ('$username', '$password', '$salt', '$name', '$email', '$regtime')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updateUser($user_id, $password, $name, $email, $privilege) {
  if (!connectedDB()) return false;
  global $con;
  $password = mysqli_real_escape_string($con, $password);
  $name = mysqli_real_escape_string($con, $name);
  $email = mysqli_real_escape_string($con, $email);
  $privilege = mysqli_real_escape_string($con, $privilege);
  $salt = rand() . rand();

  $password = crypt($password, $salt);

  $qstr = "UPDATE users SET
    password = '$password',
    name = '$name',
    email = '$email',
    privilege = '$privilege'
    WHERE id = " . $user_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function deleteUserById($user_id) {
  $qstr = 'DELETE FROM users WHERE id = ' . $user_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function deleteUserByUsername($user_username) {
  // do not call with user input
  $qstr = "DELETE FROM users WHERE username = '$user_username'";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function existUsername($user_username) {
  if (!connectedDB()) return false;
  global $con;
  $user_username = mysqli_real_escape_string($con, $user_username);
  $qstr = "SELECT * FROM users WHERE username = '$user_username'";
  $result = executeDB($qstr);
  if (mysqli_num_rows($result) === 0) {
    return false;
  }
  return true;
}

function existUserEmail($user_email) {
  if (!connectedDB()) return false;
  global $con;
  $user_email = mysqli_real_escape_string($con, $user_email);
  $qstr = "SELECT * FROM users WHERE email = '$user_email'";
  $result = executeDB($qstr);
  if (mysqli_num_rows($result) === 0) {
    return false;
  }
  return true;
}

function authenticateUser($username, $password) {
  if (!connectedDB()) return -1;
  global $con;
  $username = mysqli_real_escape_string($con, $username);
  $password = mysqli_real_escape_string($con, $password);
  $qstr = "SELECT * FROM users WHERE username = '$username'";
  echo $qstr;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return -1;
  }
  if (mysqli_num_rows($result) !== 1) {
    // username does not exist
    return -1;
  }
  $row = mysqli_fetch_array($result);
  $acpassword = $row['password'];
  $salt = $row['salt'];
  $password = crypt($password, $salt);
  if ($password !== $acpassword) {
    // incorrect password
    return -1;
  }
  return $row['id'];  // success!
}

?>
