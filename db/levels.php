<?php

function getAllLevels() {
  $qstr = 'SELECT * FROM levels';
  return executeDB($qstr);
}

function getLevelById($level_id) {
  $qstr = 'SELECT * FROM levels WHERE id = ' . $level_id;
  return executeDB($qstr);
}

function addLevel($name, $points, $description) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $points = mysqli_real_escape_string($con, $points);
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "INSERT INTO levels (name, points, description) VALUES
    ('$name', '$points', '$description')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updateLevel($level_id, $name, $points, $description) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $points = mysqli_real_escape_string($con, $points);
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "UPDATE levels SET
    name = '$name',
    points = '$points',
    description = '$description'
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
