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

					$subid = $_GET['subid'];
					$subid = unserialize($subid);
					
					$result = getProblemSubmissionById($subid);
					$row=mysqli_fetch_array($result);
					$sub_userid=$row['user_id'];
					
					echo $sub_userid;
					echo "haha";
					echo $userid;
					
					if($sub_userid==$userid){

					$total = getUserPoints($userid);
					echo "<h2>$username Total Farmed Points: <font color=green><b>$total</b></font> </h2>";

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
					$lg=mysqli_fetch_array(getLanguageformById($row['language_id']));
					$lang=$lg['name'];
					//level
					$lvl=mysqli_fetch_array(getLevelById($prob['level_id']));
					$level=$lvl['name'];
					//points
					$points=$lvl['points'];


					echo "
					<table>

					<tr><td><b>Time: </b></td>
					<td>".$row['time']."</td></tr>
					
					<tr><td><b>Code: </b></td>
					<td><a href=".$proburl.">".$code."</a></td></tr>
					
					<tr><td><b>Title: </b></td>
					<td><a href=".$proburl.">".$title."</a></td></tr>
					
					<tr><td><b>Platform: </b></td>
					<td><a href=".$pfurl.">".$platform."</a></td></tr>
					
					<tr><td><b>Language: </b></td>
					<td>".$lang."</td></tr>
					
					<tr><td><b>Level: </b></td>
					<td>".$level."</td></tr>
					
					<tr><td><b>Points: </b></td>
					<td>".$points."</td></tr>
					
					<tr><td><b>Code: </b></td>
					<td>CHANGE</td></tr>
					
					</table>

					";

					mysql_close();
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
