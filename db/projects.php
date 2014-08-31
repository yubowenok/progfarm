<?php

function getAllProjects() {
  $qstr = 'SELECT * FROM projects';
  return executeResultDB($qstr);
}

function getProjectById($project_id) {
  $qstr = 'SELECT * FROM projects WHERE id = ' . $project_id;
  return executeResultDB($qstr);
}

function addProject($code, $name, $url, $description, $points) {
  try {
    escapeStringDB($code);
    escapeStringDB($name);
    escapeStringDB($url);
    escapeStringDB($description);
    escapeStringDB($points);
  } catch (dbException $e) {
    return $e->getCode();
  }
  if (is_int($points) === false) {
    return dbStatus::INVALID_VALUE;
  }
  $qstr = "INSERT INTO projects 
    (code, name, url, description, points) 
    VALUES
    ('$code', '$name', '$url', '$description', '$points')";
  return executeDB($qstr);
}

function updateProject($project_id, $code, $name, $url, $description, $points) {
  try {
    escapeStringDB($code);
    escapeStringDB($name);
    escapeStringDB($url);
    escapeStringDB($description);
    escapeStringDB($points);
  } catch (dbException $e) {
    return $e->getCode();
  }
  if (is_int($points) === false) {
    return dbStatus::INVALID_VALUE;
  }
  $qstr = "UPDATE projects SET
    code = '$code',
    name = '$name',
    url = '$url',
    description = '$description',
    points = '$points'
    WHERE id = " . $project_id;
  return executeDB($qstr);
}

function deleteProject($project_id) {
  $qstr = 'DELETE FROM projects WHERE id = ' . $project_id;
  return executeDB($qstr);
}

?>
