<?php

function getAllProjectSubmissions() {
  $qstr = 'SELECT * FROM submissions_projects';
  return executeDB($qstr);
}

function getProjectSubmissionById($submission_id) {
  $qstr = 'SELECT * FROM submissions_projects WHERE id = ' . $submission_id;
  return executeDB($qstr);
}

function getProjectSubmissionsByUser($user_id) {
  $qstr = 'SELECT * FROM submissions_projects WHERE user_id = ' . $user_id;
  return executeDB($qstr);
}

function addProjectSubmission($user_id, $project_id, $url, $description) {
  if (!connectedDB()) return false;
  global $con;
  $time = time();
  $url = mysqli_real_escape_string($con, $url);
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "INSERT INTO submissions_projects 
    (user_id, project_id, url, description, time) 
    VALUES
    ('$user_id', '$project_id', '$url', '$description', '$time')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updateProjectSubmission($submission_id, 
  $project_id, $url, $decription) {
  if (!connectedDB()) return false;
  global $con;
  $url = mysqli_real_escape_string($con, $url);
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "UPDATE submissions_projects SET
    project_id = '$project_id',
    url = '$url',
    description = '$description'
    WHERE id = " . $submission_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function deleteProjectSubmission($submission_id) {
  $qstr = 'DELETE FROM submissions_projects WHERE id = ' . $submission_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}
?>
