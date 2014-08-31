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

					$total = getUserPoints($userid);
					echo "<h2>$username 's Progfarm</h2>";
					echo "<h3>Total Farmed Points: <font color=green><b>$total</b></font> </h3>";


					echo "<br><h3>Solved Problems: </h3><br/>";

					echo "
					<table border =3>
					<tr>
					<th>Time</th>
					<th>Code</th>
					<th>Title</th>
					<th>Platform</th>
					<th>Language</th>
					<th>Level</th>
					<th>Points</th>
					<th>Details</th>
					</tr>";

					$result=getProblemSubmissionsByUser($userid);
					
					while($row=mysqli_fetch_array($result)){
						
						//time
						$t=$row['time'];
						$time=date("Y-m-d",$t);
						
						//code & title
						$prob= mysqli_fetch_array(getProblemById($row['problem_id']));
						$code=$prob['code'];
						$title=$prob['title'];
						$proburl=$prob['url'];
						
						//platform
						$pf=mysqli_fetch_array(getPlatformById($prob['platform_id']));
						$platform=$pf['name'];
						$pfurl=$pf['url'];
						
						//language
						$lg=mysqli_fetch_array(getLanguageById($row['language_id']));
						$lang=$lg['name'];
						//echo "haha";
						
						//level
						$lvl=mysqli_fetch_array(getLevelById($prob['level_id']));
						$level=$lvl['name'];
						//points
						$points=$lvl['points'];
						

						$subid=$row['id'];
						$subid=serialize($subid);
						
						

						echo "

						<tr>
						<td>".$time."</td>
						<td><a href=".$proburl.">".$code."</a></td>
						<td><a href=".$proburl.">".$title."</a></td>
						<td><a href=".$pfurl.">".$platform."</a></td>
						<td>".$lang."</td>
						<td>".$level."</td>
						<td>".$points."</td>
						<td><a href=problem.php?subid=".$subid.">Details</a></td>
						</tr>

						";
						

					}

					echo "</table>";

					mysql_close();
					
					echo "<a href='admin.php'>Proceed as Administrator</a>";

				}
				else{
					echo "<p>Please login to access this page! <a href='login.php'>LogIn</a></p>";
				}
				?>



			</div>
		</div>

	</body>
</html>
