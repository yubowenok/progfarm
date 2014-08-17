<?php

function getAllLevels() {
  $qstr = 'SELECT * FROM levels';
  return executeDB($qstr);
}

function getLevelById($level_id) {
  $qstr = 'SELECT * FROM levels WHERE id = ' . $level_id;
  return executeDB($qstr);
}

function addLevel($name, $points) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $points = mysqli_real_escape_string($con, $points);
  $qstr = "INSERT INTO levels (name, points) VALUES
    ('$name', '$points')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updateLevel($level_id, $name, $points) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $points = mysqli_real_escape_string($con, $points);
  $qstr = "UPDATE levels SET
    name = '$name',
    points = '$points'
    WHERE id = " . $level_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function deleteLevel($level_id) {
  $qstr = 'DELETE FROM levels WHERE id = ' . $level_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
} 

?>
