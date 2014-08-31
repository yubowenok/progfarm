<?php

function getAllPlatforms() {
  $qstr = 'SELECT * FROM platforms';
  return executeDB($qstr);
}

function getPlatformById($platform_id) {
  $qstr = "SELECT * FROM platforms WHERE id = " . $platform_id;
  return executeDB($qstr);
}

function addPlatform($name, $url, $description) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $url = mysqli_real_escape_string($con, $url);
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "INSERT INTO platforms (name, url, description) 
    VALUES
    ('$name', '$url', '$description')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updatePlatform($platform_id, $name, $url, $description) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $url = mysqli_real_escape_string($con, $url);
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "UPDATE platforms SET
    name = '$name',
    url = '$url',
    description = '$description'
    WHERE id = " . $platform_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function deletePlatform($platform_id) {
  $qstr = 'DELETE FROM platforms WHERE id = ' . $platform_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

?>
