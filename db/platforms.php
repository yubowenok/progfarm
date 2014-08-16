<?php

function getAllPlatforms() {
  global $con;
  if (!$con) {
    return null;
  }
  $qstr = 'SELECT * FROM platforms';
  $result = mysqli_query($con, $qstr);
  return $result;
}

function getPlatformById($platform_id) {
  global $con;
  if (!$con) {
    return null;
  }
  $qstr = 'SELECT * FROM platforms WHERE id=' . $platform_id;
  $result = mysqli_query($con, $qstr);
  return $result;
}

?>