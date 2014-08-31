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
					
					include 'db/db.php';
					connectDB('zyt144','zengyuting');
					
					$result = getUserById($userid);
					$row = mysqli_fetch_array($result);
					$priv = $row['privilege'];
					
					if($priv>0){
						
						
						
					}
					else{
						echo "<p><font color=red>You do not have access to this page!</font></p>";
					}
				}
				else{
					echo "<p>Please login to access this page! <a href='login.php'>LogIn</a></p>";
				}
				?>



			</div>
		</div>

	</body>
</html>
