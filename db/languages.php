<?php

function getAllLanguages() {
  $qstr = 'SELECT * FROM languages';
  return executeDB($qstr);
}

function getLanguageById($level_id) {
  $qstr = 'SELECT * FROM languages WHERE id = ' . $level_id;
  return executeDB($qstr);
}

function addLanguage($name, $description) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "INSERT INTO languages (name, description)
    VALUES
    ('$name', '$description')";
  $result = executeDB($qstr);
  if (is_null($result)) {
    return false;
  }
  return true;
}

function updateLanguage($language_id, $name, $description) {
  if (!connectedDB()) return false;
  global $con;
  $name = mysqli_real_escape_string($con, $name);
  $description = mysqli_real_escape_string($con, $description);
  $qstr = "UPDATE languages SET
    name = '$name',
    description = '$description'
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
