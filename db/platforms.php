<?php

function getAllPlatforms() {
  $qstr = 'SELECT * FROM platforms';
  return executeDB($qstr);
}

function getPlatformById($platform_id) {
  $qstr = "SELECT * FROM platforms WHERE id = " . $platform_id;
  return executeDB($qstr);
}

function addPlatform($name, $url) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $url = mysqli_real_escape_string($con, $url);
  $qstr = "INSERT INTO platforms (name, url) VALUES
    ('$name', '$url')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updatePlatform($platform_id, $name, $url) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $url = mysqli_real_escape_string($con, $url);
  $qstr = "UPDATE platforms SET
    name = '$name',
    url = '$url'
    WHERE id = " . $platform_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function deletePlatform($platform_id) {
  if (!connectedDB()) return false;
  $qstr = 'DELETE FROM platforms WHERE id = ' . $platform_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
} 

?>
