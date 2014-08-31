<?php

function getAllProjectSubmissions() {
  $qstr = 'SELECT * FROM submissions_projects';
  return executeResultDB($qstr);
}

function getProjectSubmissionById($submission_id) {
  $qstr = 'SELECT * FROM submissions_projects WHERE id = ' . $submission_id;
  return executeResultDB($qstr);
}

function getProjectSubmissionsByUser($user_id) {
  $qstr = 'SELECT * FROM submissions_projects WHERE user_id = ' . $user_id;
  return executeResultDB($qstr);
}

function addProjectSubmission($user_id, $project_id, $url, $description) {
  try {
    escapeStringDB($url);
    escapeStringDB($description);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $time = time();
  $qstr = "INSERT INTO submissions_projects 
    (user_id, project_id, url, description, time) 
    VALUES
    ('$user_id', '$project_id', '$url', '$description', '$time')";
  return executeDB($qstr);
}

function updateProjectSubmission($submission_id, 
  $project_id, $url, $description) {
  try {
    escapeStringDB($url);
    escapeStringDB($description);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "UPDATE submissions_projects SET
    project_id = '$project_id',
    url = '$url',
    description = '$description'
    WHERE id = " . $submission_id;
  return executeDB($qstr);
}

function deleteProjectSubmission($submission_id) {
  $qstr = 'DELETE FROM submissions_projects WHERE id = ' . $submission_id;
  return executeDB($qstr);
}

?>
