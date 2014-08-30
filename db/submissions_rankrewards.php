<?php

function getAllRankrewardSubmissions() {
  $qstr = 'SELECT * FROM submissions_rankrewards';
  return executeDB($qstr);
}

function getProjectSubmissionById($submission_id) {
  $qstr = 'SELECT * FROM submissions_rankrewards WHERE id = ' . $submission_id;
  return executeDB($qstr);
}

function getRankrewardSubmissionsByUser($user_id) {
  $qstr = 'SELECT * FROM submissions_rankrewards WHERE user_id = ' . $user_id;
  return executeDB($qstr);
}

function addRankrewardSubmission($user_id, 
  $rankreward_id, $name, $url, $description, $rank) {
  if (!connectedDB()) return false;
  global $con;
  $time = time();
  $name = mysqli_real_escape_string($con, $name);
  $url = mysqli_real_escape_string($con, $url);
  $description = mysqli_real_escape_string($con, $description);
  $rank = mysqli_real_escape_string($con, $rank);
  if (is_int($rank) === false) {
    return false;
  }
  $qstr = "INSERT INTO submissions_rankrewards 
    (user_id, rankreward_id, name, url, description, rank, time) 
    VALUES
    ('$user_id', '$rankreward_id', '$name', '$url', '$description', '$rank', '$time')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
} 
  
function updateRankrewardSubmission($submission_id, 
  $rankreward_id, $name, $url, $description, $rank) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $url = mysqli_real_escape_string($con, $url);
  $description = mysqli_real_escape_string($con, $description);
  $rank = mysqli_real_escape_string($con, $rank);
  if (is_int($rank) === false) {
    return false;
  }
  $qstr = "UPDATE submissions_rankrewards SET
    rankreward_id = '$rankreward_id',
    name = '$name',
    url = '$url',
    description = '$description',
    rank = '$rank'
    WHERE id = " . $submission_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function deleteRankrewardSubmission($submission_id) {
  $qstr = 'DELETE FROM submissions_rankrewards WHERE id = ' . $submission_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}
?>
