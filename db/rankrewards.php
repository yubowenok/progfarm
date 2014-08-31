<?php

function getAllRankrewards() {
  $qstr = 'SELECT * FROM rankrewards';
  return executeResultDB($qstr);
}

function getRankrewardById($rankreward_id) {
  $qstr = 'SELECT * FROM rankrewards WHERE id = ' . $rankreward_id;
  return executeResultDB($qstr);
}
  
function addRankreward($platform_id, $name, $description, $rankl, $rankr, $points) {
  try {
    escapeStringDB($name);
    escapeStringDB($description);
    escapeStringDB($rankl);
    escapeStringDB($rankr);
    escapeStringDB( $points);
  } catch (dbException $e) {
    return $e->getCode();
  }
  if (is_int($points) === false || is_int($rankl) === false || 
    is_int($rankr) === false || $rankr < $rankl) {
    return dbStatus::INVALID_VALUE;
  }
  $qstr = "INSERT INTO rankrewards 
    (platform_id, name, description, rankl, rankr, points) 
    VALUES
    ('$platform_id', '$name', '$description', '$rankl', '$rankr', '$points')";
  return executeDB($qstr);
}

function updateRankreward($rankreward_id, 
  $platform_id, $name, $description, $rankl, $rankr, $points) {
  try {
    escapeStringDB($name);
    escapeStringDB($description);
    escapeStringDB($rankl);
    escapeStringDB($rankr);
    escapeStringDB( $points);
  } catch (dbException $e) {
    return $e->getCode();
  }
  if (is_int($points) === false || is_int($rankl) === false || 
    is_int($rankr) === false || $rankr < $rankl) {
    return dbStatus::INVALID_VALUE;
  }
  $qstr = "UPDATE rankrewards SET
    platform_id = '$platform_id',
    name = '$name',
    description = '$description',
    rankl = '$rankl',
    rankr = '$rankr',
    points = '$points'
    WHERE id = " . $rankreward_id;
  return executeDB($qstr);
}

function deleteRankreward($rankreward_id) {
  $qstr = 'DELETE FROM rankrewards WHERE id = ' . $rankreward_id;
  return executeDB($qstr);
}

?>
