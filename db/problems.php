<?php

function getAllProblems() {
  $qstr = 'SELECT * FROM problems';
  return executeResultDB($qstr);
}

function getProblemById($problem_id) {
  $qstr = 'SELECT * FROM problems WHERE id = ' . $problem_id;
  return executeResultDB($qstr);
}

function addProblem($code, $title, $url, $platform_id, $level_id, $description) {
  try {
    escapeStringDB($code);
    escapeStringDB($title);
    escapeStringDB($url);
    escapeStringDB($description);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "INSERT INTO problems 
    (code, title, url, platform_id, level_id, description) 
    VALUES
    ('$code', '$title', '$url', '$platform_id', '$level_id', '$description')";
  return executeDB($qstr);
}

function updateProblem($problem_id, 
  $code, $title, $url, $platform_id, $level_id, $description) {
  try {
    escapeStringDB($code);
    escapeStringDB($title);
    escapeStringDB($url);
    escapeStringDB($description);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "UPDATE problems SET
    code = '$code',
    title = '$title',
    url = '$url',
    platform_id = '$platform_id',
    level_id = '$level_id',
    description = '$description'
    WHERE id = " . $problem_id;
  return executeDB($qstr);
}

function deleteProblem($problem_id) {
  $qstr = 'DELETE FROM problems WHERE id = ' . $problem_id;
  return executeDB($qstr);
}

?>
