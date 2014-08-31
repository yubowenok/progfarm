<?php

function getAllPlatforms() {
  $qstr = 'SELECT * FROM platforms';
  return executeResultDB($qstr);
}

function getPlatformById($platform_id) {
  $qstr = "SELECT * FROM platforms WHERE id = " . $platform_id;
  return executeResultDB($qstr);
}

function addPlatform($name, $url, $description) {
  try {
    escapeStringDB($name);
    escapeStringDB($url);
    escapeStringDB($description);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "INSERT INTO platforms (name, url, description) 
    VALUES
    ('$name', '$url', '$description')";
  return executeDB($qstr);
}

function updatePlatform($platform_id, $name, $url, $description) {
  try {
    escapeStringDB($name);
    escapeStringDB($url);
    escapeStringDB($description);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "UPDATE platforms SET
    name = '$name',
    url = '$url',
    description = '$description'
    WHERE id = " . $platform_id;
  return executeDB($qstr);
}

function deletePlatform($platform_id) {
  $qstr = 'DELETE FROM platforms WHERE id = ' . $platform_id;
  return executeDB($qstr);
}

?>
