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

		<div class="header">
			<div class="container">
				<ul class="nav nav-tabs">

					<li><a href="index.php">Home</a></li>
					<li><a href="plist.php">Problems</a></li>
					<li><a href="submit.php">Submit</a></li>
					<li><a href="solved.php">Mine</a></li>

					<li><a href="login.php"> Log In </a></li>
					<li><a href="logout.php"> Log Out </a></li>
					<li><a href="help.php"> Help </a></li>


				</ul>
			</div>
		</div>

		<div class="jumbotron">
			<div class="container">

				<?php
				
				if($username && $userid){
					echo "<h2>$username Solved Problems: </h2><br/>";
				
					echo "
					<table>
						<tr>
							<th>Time</th>
							<th>Title</th>
							<th>Platform</th>
							<th>Language</th>
							<th>Details</th>
						</tr>";
						
						include 'db/db.php';
						connectDB('zyt144','zengyuting');
						
						$sub=mysqli_result getSubmissionByUser($userid);
						while($sub){
							
							$prob= mysqli_result getProblemById($sub['problem_id']);
							$title=$prob['title'];
							$platform=mysqli_result getPlatformById($prob['platform_id']);
							$lang=mysqli_result getLanguageformById($sub['language_id']);
							
							echo "
							
							<tr>
								<td>$sub['time']</td>
								<td>$title</td>
								<td>$platform</td>
								<td>$lang</td>
								<td><a href=problem.php?subid=$sub['id']</td>
							</tr>
							
							";
							
						}
						
					echo "</table>";
					
					mysql_close();
					
				}
				else{
					echo "<p>Please login to access this page! <a href='login.php'>LogIn</a></p>";

				?>



			</div>
		</div>

	</body>
</html>
