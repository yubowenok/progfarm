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
				
				include 'db/db.php';
				connectDB('zyt144','zengyuting');
					
					echo "<h2>Treat Yourself with Earnings !</h2><br/>";
				
					echo "
					<table border =3>
						<tr>
							<th>Code</th>
							<th>Title</th>
							<th>Platform</th>
							<th>Level</th>
							<th>Points</th>
						</tr>";
						
						
						
						$result=getAllItems();
						while($prob=mysqli_fetch_array($result)){
							$pid=$prob['id'];
							
							//title
							$code=$prob['code'];
							$title=$prob['title'];
							$proburl=$prob['url'];
							//platform
							$pf=mysqli_fetch_array(getPlatformById($prob['platform_id']));
							$platform=$pf['name'];
							$pfurl=$pf['url'];
							//level
							$lvl=mysqli_fetch_array(getLevelById($prob['level_id']));
							$level=$lvl['name'];
							//points
							$points=$lvl['points'];
							
							
							echo "
							
							<tr>
								<td><a href=".$proburl.">".$code."</a></td>
								<td><a href=".$proburl.">".$title."</a></td>
								<td><a href=".$pfurl.">".$platform."</a></td>
								<td>".$level."</td>
								<td>".$points."</td>
								<form action='submit.php' method=post>
								<td><input type = hidden name=hidden value=".$pid."></a></td>
								<td><input type = submit value=Buy></a></td>
								</form>
							</tr>
							
							";
							
							
						}
						
					echo "</table>";
					
					mysql_close();
					

				?>



			</div>
		</div>

	</body>
</html>
