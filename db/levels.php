<?php

function getAllLevels() {
  global $con;
  if (!$con) {
    return null;
  }
  $qstr = 'SELECT * FROM levels';
  $result = mysqli_query($con, $qstr);
  return $result;
}

function getLevelById($level_id) {
  global $con;
  if (!$con) {
    return null;
  }
  $qstr = 'SELECT * FROM levels' . $level_id;
  $result = mysqli_query($con, $qstr);
  return $result;
}

?>