<?php

function getAllProblems() {
  $qstr = 'SELECT * FROM problems';
  return executeDB($qstr);
}

function getProblemById($problem_id) {
  $qstr = 'SELECT * FROM problems WHERE id = ' . $problem_id;
  return executeDB($qstr);
}

function addProblem($code, $title, $url, $platform_id, $level_id, $description) {
  if (!connectedDB()) return false;
  global $con;
  $code = mysqli_real_escape_string($con, $code);
  $title = mysqli_real_escape_string($con, $title);
  $url = mysqli_real_escape_string($con, $url);
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "INSERT INTO problems 
    (code, title, url, platform_id, level_id, description) 
    VALUES
    ('$code', '$title', '$url', '$platform_id', '$level_id', '$description')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updateProblem($problem_id, 
  $code, $title, $url, $platform_id, $level_id, $description) {
  if (!connectedDB()) return false;
  global $con;
  $code = mysqli_real_escape_string($con, $code);
  $title = mysqli_real_escape_string($con, $title);
  $url = mysqli_real_escape_string($con, $url);
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "UPDATE problems SET
    code = '$code',
    title = '$title',
    url = '$url',
    platform_id = '$platform_id',
    level_id = '$level_id',
    description = '$description'
    WHERE id = " . $problem_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function deleteProblem($problem_id) {
  $qstr = 'DELETE FROM problems WHERE id = ' . $problem_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

?>
