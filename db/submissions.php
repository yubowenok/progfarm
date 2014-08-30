<?php

function getAllSubmissions() {
  $qstr = 'SELECT * FROM submissions';
  return executeDB($qstr);
}

function getSubmissionById($submission_id) {
  $qstr = 'SELECT * FROM submissions WHERE submission_id = ' . $submission_id;
  return executeDB($qstr);
}


function getSubmissionsByUser($user_id) {
  $qstr = 'SELECT * FROM submissions WHERE user_id = ' . $user_id;
  return executeDB($qstr);
}

function addSubmission($user_id, $problem_id, $language_id, $url, $description) {
  if (!connectedDB()) return false;
  global $con;
  $url = mysqli_real_escape_string($con, $url);
  $time = time();
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "INSERT INTO submissions 
    (user_id, problem_id, language_id, url, time, description) 
    VALUES
    ('$user_id', '$problem_id', '$language_id', $url', '$time', '$description')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updateSubmission($submission_id, $problem_id, $language_id, $url, $decription) {
  if (!connectedDB()) return false;
  global $con;
  $url = mysqli_real_escape_string($con, $url);
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "UPDATE submissions SET
    problem_id = '$problem_id',
    language_id = '$language_id',
    url = '$url',
    description = '$description'
    WHERE id = " . $submission_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function deleteSubmission($submission_id) {
  $qstr = 'DELETE FROM submissions WHERE id = ' . $submission_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}
?>
