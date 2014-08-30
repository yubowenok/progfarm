<?php

function getAllProblemSubmissions() {
  $qstr = 'SELECT * FROM submissions_problems';
  return executeDB($qstr);
}

function getProblemSubmissionById($submission_id) {
  $qstr = 'SELECT * FROM submissions_problems WHERE id = ' . $submission_id;
  return executeDB($qstr);
}


function getProblemSubmissionsByUser($user_id) {
  $qstr = 'SELECT * FROM submissions_problems WHERE user_id = ' . $user_id;
  return executeDB($qstr);
}

function addProblemSubmission($user_id, $problem_id, $language_id, $url, $description) {
  if (!connectedDB()) return false;
  global $con;
  $url = mysqli_real_escape_string($con, $url);
  $time = time();
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "INSERT INTO submissions_problems 
    (user_id, problem_id, language_id, url, time, description) 
    VALUES
    ('$user_id', '$problem_id', '$language_id', '$url', '$time', '$description')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updateProblemSubmission($submission_id, $problem_id, $language_id, $url, $decription) {
  if (!connectedDB()) return false;
  global $con;
  $url = mysqli_real_escape_string($con, $url);
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "UPDATE submissions_problems SET
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

function deleteProblemSubmission($submission_id) {
  $qstr = 'DELETE FROM submissions_problems WHERE id = ' . $submission_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}
?>
