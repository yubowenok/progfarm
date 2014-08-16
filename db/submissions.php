<?php

function getAllSubmissions() {
  global $con;
  if (!$con) {
    return null;
  }
  $qstr = 'SELECT * FROM submissions';
  $result = mysqli_query($con, $qstr);
  return $result;
}

function getSubmissionsByUser($user_id) {
  global $con;
  if (!$con) {
    return null;
  }
  $qstr = 'SELECT * FROM problems WHERE user_id=' . $user_id;
  $result = mysqli_query($con, $qstr);
  return $result;
}

?>