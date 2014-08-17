<?php

function getAllLanguages() {
  $qstr = 'SELECT * FROM languages';
  return executeDB($qstr);
}

function getLanguageById($level_id) {
  $qstr = 'SELECT * FROM languages WHERE id = ' . $level_id;
  return executeDB($qstr);
}

function addLanguage($name) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $qstr = "INSERT INTO languages (name) VALUES
    ('$name')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updateLanguage($language_id, $name) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $qstr = "UPDATE languages SET
    name = '$name',
    WHERE id = " . $language_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function deleteLanguage($language_id) {
  $qstr = 'DELETE FROM languages WHERE id = ' . $language_id;
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
} 

?>
