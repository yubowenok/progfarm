<?php

function getAllUsers() {
  $qstr = 'SELECT * FROM users';
  return executeResultDB($qstr);
}

function getUserPoints($user_id) {
  $qstr = 'SELECT SUM(points) AS points FROM levels, problems, submissions_problems WHERE 
    levels.id = problems.level_id AND
    submissions_problems.problem_id = problems.id AND
    submissions_problems.user_id = ' . $user_id;
  $result = executeResultDB($qstr);
  if (is_int($result)) return $result;
  if (mysqli_num_rows($result) === 0) return 0;
  $row = mysqli_fetch_array($result);
  return $row['points'];
}

function getUserByUsername($user_username) {
  try {
    escapeStringDB($user_username);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "SELECT * FROM users WHERE username = '$user_username'";
  return executeResultDB($qstr);
}

function getUserById($user_id) {
  $qstr = 'SELECT * FROM users WHERE id = ' . $user_id;
  return executeResultDB($qstr);
}

function addUser($username, $password, $name, $email, $privilege) {
  try {
    escapeStringDB($username);
    escapeStringDB($password);
    escapeStringDB($name);
    escapeStringDB($email);
    escapeStringDB($privilege);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $regtime = time();
  $salt = (rand() % 65536) * (rand() % 65536);

  $password = crypt($password, $salt);

  $qstr = "INSERT INTO users (username, password, salt, name, email, regtime) VALUES
    ('$username', '$password', '$salt', '$name', '$email', '$regtime')";
  return executeDB($qstr);
}

function updateUser($user_id, $password, $name, $email, $privilege) {
  try {
    escapeStringDB($username);
    escapeStringDB($password);
    escapeStringDB($name);
    escapeStringDB($email);
    escapeStringDB($privilege);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $salt = (rand() % 65536) * (rand() % 65536);
  $password = crypt($password, $salt);

  $qstr = "UPDATE users SET
    password = '$password',
    name = '$name',
    email = '$email',
    privilege = '$privilege',
    salt = '$salt'
    WHERE id = " . $user_id;
  return executeDB($qstr);
}

function deleteUserById($user_id) {
  $qstr = 'DELETE FROM users WHERE id = ' . $user_id;
  return executeDB($qstr);
}

function deleteUserByUsername($user_username) {
  // do not call with user input
  $qstr = "DELETE FROM users WHERE username = '$user_username'";
  return executeDB($qstr);
}

function existUsername($user_username) {
  try {
    escapeStringDB($user_username);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "SELECT * FROM users WHERE username = '$user_username'";
  $result = executeResultDB($qstr);
  if (is_int($result) === true) return $result;
  if (mysqli_num_rows($result) === 0) return false;
  return true;
}

function existUserEmail($user_email) {
  try {
    escapeStringDB($user_email);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "SELECT * FROM users WHERE email = '$user_email'";
  $result = executeResultDB($qstr);
  if (is_int($result) === true) return $result;
  if (mysqli_num_rows($result) === 0) return false;
  return true;
}

function authenticateUser($username, $password) {
  try {
    escapeStringDB($username);
    escapeStringDB($password);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "SELECT * FROM users WHERE username = '$username'";
  $result = executeResultDB($qstr);
  if (is_int($result) === true) return $result;
  if (mysqli_num_rows($result) === 0) {
    return -1; // username does not exist
  }
  $row = mysqli_fetch_array($result);
  $acpassword = $row['password'];
  $salt = $row['salt'];
  $password = crypt($password, $salt);
  if ($password !== $acpassword) {
    return -1; // incorrect password
  }
  return $row['id'];  // success!
}

?>
