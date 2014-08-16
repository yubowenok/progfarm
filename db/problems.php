<?php

function getAllProblems() {
  global $con;
  if (!$con) {
    return null;
  }
  $qstr = 'SELECT * FROM problems';
  $result = mysqli_query($con, $qstr);
  return $result;
}

function getProblemById($problem_id) {
  global $con;
  if (!$con) {
    return null;
  }
  $qstr = 'SELECT * FROM problems WHERE id=' . $problem_id;
  $result = mysqli_query($con, $qstr);
  return $result;
}

?>