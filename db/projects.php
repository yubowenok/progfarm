<?php

function getAllProjects() {
  $qstr = 'SELECT * FROM projects';
  return executeDB($qstr);
}

function getProjectById($project_id) {
  $qstr = 'SELECT * FROM projects WHERE id = ' . $project_id;
  return executeDB($qstr);
}

function addProject($code, $name, $url, $description, $points) {
  if (!connectedDB()) return false;
  global $con;
  $code = mysqli_real_escape_string($con, $code);
  $name = mysqli_real_escape_string($con, $name);
  $url = mysqli_real_escape_string($con, $url);
  $description = mysqli_real_escape_string($con, $description);
  $points = mysqli_real_escape_string($con, $points);
  if (is_int($points) === false) {
    return false;
  }
  $qstr = "INSERT INTO projects 
    (code, name, url, description, points) 
    VALUES
    ('$code', '$name', '$url', '$description', '$points')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updateProject($project_id, $code, $name, $url, $description, $points) {
  if (!connectedDB()) return false;
  global $con;
  $code = mysqli_real_escape_string($con, $code);
  $name = mysqli_real_escape_string($con, $name);
  $url = mysqli_real_escape_string($con, $url);
  $description = mysqli_real_escape_string($con, $description);
  $points = mysqli_real_escape_string($con, $points);
  if (is_int($points) === false) {
    return false;
  }
  $qstr = "UPDATE projects SET
    code = '$code',
    name = '$name',
    url = '$url',
    description = '$description',
    points = '$points'
    WHERE id = " . $project_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function deleteProject($project_id) {
  $qstr = 'DELETE FROM projects WHERE id = ' . $project_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

?>
