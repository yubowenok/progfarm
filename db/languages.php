<?php

function getAllLanguages() {
  $qstr = 'SELECT * FROM languages';
  return executeResultDB($qstr);
}

function getLanguageById($level_id) {
  $qstr = 'SELECT * FROM languages WHERE id = ' . $level_id;
  return executeResultDB($qstr);
}

function addLanguage($name, $description) {
  try {
    escapeStringDB($name);
    escapeStringDB($description);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "INSERT INTO languages (name, description)
    VALUES
    ('$name', '$description')";
  return executeDB($qstr);
}

function updateLanguage($language_id, $name, $description) {
  try {
    escapeStringDB($name);
    escapeStringDB($description);
  } catch (dbException $e) {
    return $e->getCode();
  }
  $qstr = "UPDATE languages SET
    name = '$name',
    description = '$description'
    WHERE id = " . $language_id;
  return executeDB($qstr);
  
}

function deleteLanguage($language_id) {
  $qstr = 'DELETE FROM languages WHERE id = ' . $language_id;
  return executeDB($qstr);
}

?>
