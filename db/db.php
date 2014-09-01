<?php

abstract class dbStatus {
	const 
	  SUCCESS = 1,
	  NOT_CONNECTED = 0,
	  DUPLICATED_VALUE = -1,
	  INVALID_VALUE = -2,
	  OTHER = -10;
}
class dbException extends Exception {
  public function __construct($message, $code = 0, Exception $previous = null) {
      parent::__construct($message, $code, $previous);
  }
  public function __toString() {
      return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
  }
}

$con = null;
$dnerror = '';

function connectDB($username, $password) {
  global $con, $dberror;
  try {
    $con = mysqli_connect('localhost' ,$username, $password, 'progfarm');
  } catch (Exception $e) {
    $dberror = mysqli_connect_error();
    return dbStatus::NOT_CONNECTED;
  }
  return dbStatus::SUCCESS;
}

function executeDB($qstr, &$result) {
  global $con, $dbStatus;
  if (!$con) {
    return dbStatus::NOT_CONNECTED;
  }
  $result = mysqli_query($con, $qstr);
  if (!$result) {
    $dbStatus = mysqli_error($con);
    if (strpos($dbStatus, 'Duplicate') === 0) {
      return dbStatus::DUPLICATED_VALUE;
    }
    return dbStatus::OTHER;
  }
  return dbStatus::SUCCESS;
}

function executeResultDB($qstr){
  $status = executeDB($qstr, $result);
  if ($status === dbStatus::SUCCESS) return $result;
  else return $status;
}

function closeDB() {
  global $con;
  mysqli_close($con);
}

function escapeStringDB(&$str){
  global $con, $dberror;
  if (!$con) {
    throw new dbException(mysqli_connect_errno(), dbStatus::NOT_CONNECTED);
  }
  $str = mysqli_real_escape_string($con, $str);
}

function getErrorDB() {
  global $dbStatus;
  return getErrorDB();
}

include 'platforms.php';
include 'levels.php';
include 'problems.php';
include 'languages.php';
include 'users.php';
include 'projects.php';
include 'rankrewards.php';
include 'submissions_problems.php';
include 'submissions_projects.php';
include 'submissions_rankrewards.php';
?>
