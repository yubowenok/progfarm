<?php

function getAllRankrewards() {
  $qstr = 'SELECT * FROM rankrewards';
  return executeDB($qstr);
}

function getRankrewardById($rankreward_id) {
  $qstr = 'SELECT * FROM rankrewards WHERE id = ' . $rankreward_id;
  return executeDB($qstr);
}

  id INTEGER NOT NULL AUTO_INCREMENT,
  platform_id INTEGER NOT NULL,
  name VARCHAR(50) NOT NULL,
  description VARCHAR(200),
  rankl INTEGER,
  rankr INTEGER,
  points INTEGER UNSIGNED,
  
function addRankreward($platform_id, $name, $description, $rankl, $rankr, $points) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $description = mysqli_real_escape_string($con, $description);
  $rankl = mysqli_real_escape_string($con, $rankl);
  $rankr = mysqli_real_escape_string($con, $rankr);
  $points = mysqli_real_escape_string($con, $points);
  if (is_int($points) === false || is_int($rankl) === false || 
    is_int($rankr) === false || $rankr < $rankl) {
    return false;
  }
  $qstr = "INSERT INTO rankrewards 
    (platform_id, name, description, rankl, rankr, points) 
    VALUES
    ('$platform_id', '$name', '$description', '$rankl', '$rankr', '$points')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updateRankreward($rankreward_id, 
  $platform_id, $name, $description, $rankl, $rankr, $points) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $description = mysqli_real_escape_string($con, $description);
  $rankl = mysqli_real_escape_string($con, $rankl);
  $rankr = mysqli_real_escape_string($con, $rankr);
  $points = mysqli_real_escape_string($con, $points);
  if (is_int($points) === false || is_int($rankl) === false || 
    is_int($rankr) === false || $rankr < $rankl) {
    return false;
  }
  $qstr = "UPDATE rankrewards SET
    platform_id = '$platform_id',
    name = '$name',
    description = '$description',
    rankl = '$rankl',
    rankr = '$rankr',
    points = '$points'
    WHERE id = " . $rankreward_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

?>
