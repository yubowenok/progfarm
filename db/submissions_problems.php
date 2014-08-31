<?php

function getAllProblemSubmissions() {
  $qstr = 'SELECT * FROM submissions_problems';
  return executeResultDB($qstr);
}

function getProblemSubmissionById($submission_id) {
  $qstr = 'SELECT * FROM submissions_problems WHERE id = ' . $submission_id;
  return executeResultDB($qstr);
}


function getProblemSubmissionsByUser($user_id) {
  $qstr = 'SELECT * FROM submissions_problems WHERE user_id = ' . $user_id;
  return executeResultDB($qstr);
}

function addProblemSubmission($user_id, $problem_id, $language_id, $url='', $description='') {
  try {
    escapeStringDB($url);
    escapeStringDB($description);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $time = time();
  $qstr = "INSERT INTO submissions_problems 
    (user_id, problem_id, language_id, url, time, description) 
    VALUES
    ('$user_id', '$problem_id', '$language_id', '$url', '$time', '$description')";
   $status = executeDB($qstr, $result);
   return $status;
}

function updateProblemSubmission($submission_id, $problem_id, $language_id, $url, $description) {
  try {
    escapeStringDB($url);
    escapeStringDB($description);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "UPDATE submissions_problems SET
    problem_id = '$problem_id',
    language_id = '$language_id',
    url = '$url',
    description = '$description'
    WHERE id = " . $submission_id;
  return executeDB($qstr);
}

function deleteProblemSubmission($submission_id) {
  $qstr = 'DELETE FROM submissions_problems WHERE id = ' . $submission_id;
  return executeDB($qstr);
}
?>
