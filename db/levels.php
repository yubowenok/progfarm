<?php

function getAllLevels() {
  $qstr = 'SELECT * FROM levels';
  return executeResultDB($qstr);
}

function getLevelById($level_id) {
  $qstr = 'SELECT * FROM levels WHERE id = ' . $level_id;
  return executeResultDB($qstr);
}

function addLevel($name, $points, $description) {
  try {
    escapeStringDB($name);
    escapeStringDB($points);
    escapeStringDB($description);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "INSERT INTO levels (name, points, description) VALUES
    ('$name', '$points', '$description')";
  return executeDB($qstr);
}

function updateLevel($level_id, $name, $points, $description) {
  try {
    escapeStringDB($name);
    escapeStringDB($points);
    escapeStringDB($description);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "UPDATE levels SET
    name = '$name',
    points = '$points',
    description = '$description'
    WHERE id = " . $level_id;
  return executeDB($qstr);
}

function deleteLevel($level_id) {
  $qstr = 'DELETE FROM levels WHERE id = ' . $level_id;
  return executeDB($qstr);
}

?>
