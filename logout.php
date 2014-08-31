<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$userid = $_SESSION['user_id'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>

<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet'>
		<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp2/css/bootstrap.min.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
	</head>

	<body>

		<?php include 'menu.php'; ?>

		<div class="jumbotron">
			<div class="container">

				<?php

				if($username && $userid){
					
					session_destroy();//log out
					
					echo "<p>You have been logged out! <a href='login.php'>LogIn</a></p>";
				}
				else{

					echo "<p>You are not logged in! <a href='login.php'>LogIn</a></p>";

				}

				?>

			</div>
		</div>

	</body>
</html>

