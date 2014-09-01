<?php

function getAllRankrewardSubmissions() {
  $qstr = 'SELECT * FROM submissions_rankrewards';
  return executeResultDB($qstr);
}

function getRankrewardSubmissionById($submission_id) {
  $qstr = 'SELECT * FROM submissions_rankrewards WHERE id = ' . $submission_id;
  return executeResultDB($qstr);
}

function getRankrewardSubmissionsByUser($user_id) {
  $qstr = 'SELECT * FROM submissions_rankrewards WHERE user_id = ' . $user_id;
  return executeResultDB($qstr);
}

function addRankrewardSubmission($user_id, 
  $rankreward_id, $name, $url, $description, $rank) {
  try {
    escapeStringDB($name);
    escapeStringDB($url);
    escapeStringDB($description);
    escapeStringDB($rank);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $time = time();
  if (is_int($rank) === false) {
    return dbStatus::INVALID_VALUE;
  }
  $qstr = "INSERT INTO submissions_rankrewards 
    (user_id, rankreward_id, name, url, description, rank, time) 
    VALUES
    ('$user_id', '$rankreward_id', '$name', '$url', '$description', '$rank', '$time')";
  return executeDB($qstr);
} 
  
function updateRankrewardSubmission($submission_id, 
  $rankreward_id, $name, $url, $description, $rank) {
  try {
    escapeStringDB($name);
    escapeStringDB($url);
    escapeStringDB($description);
    escapeStringDB($rank);
  } catch (dbException $e) {
    return $e->getCode();
  }
  if (is_int($rank) === false) {
    return dbStatus::INVALID_VALUE;
  }
  $qstr = "UPDATE submissions_rankrewards SET
    rankreward_id = '$rankreward_id',
    name = '$name',
    url = '$url',
    description = '$description',
    rank = '$rank'
    WHERE id = " . $submission_id;
  return executeDB($qstr);
}

function deleteRankrewardSubmission($submission_id) {
  $qstr = 'DELETE FROM submissions_rankrewards WHERE id = ' . $submission_id;
  return executeDB($qstr);
}
?>
