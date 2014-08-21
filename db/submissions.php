<?php

function getAllSubmissions() {
  $qstr = 'SELECT * FROM submissions';
  return executeDB($qstr);
}

function getSubmissionsByUser($user_id) {
  $qstr = 'SELECT * FROM problems WHERE user_id = ' . $user_id;
  return executeDB($qstr);
}

function addSubmission($user_id, $problem_id, $language_id, $url, $time) {
  if (!connectedDB()) return false;
  global $con;
  $url = mysqli_real_escape_string($con, $url);
  $time = mysqli_real_escape_string($con, $time);
  $qstr = "INSERT INTO submissions (user_id, problem_id, language_id, url, time) VALUES
    ('$user_id', '$problem_id', '$language_id', $url', '$time')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updateSubmission($submission_id, $url) {
  if (!connectedDB()) return false;
  global $con;
  $url = mysqli_real_escape_string($con, $url);
  $qstr = "UPDATE submissions SET
    url = '$url'
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
