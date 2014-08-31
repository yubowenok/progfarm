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


					//	if(isset($_GET['submit'])){

					$pid=$_GET['hidden'];
					if(empty($pid)){
						$pid=$_POST['hidden1'];
					}

					$prob= mysqli_fetch_array(getProblemById($pid));

					//code & title
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




					if(isset($_POST['record'])){

						$lang_id = $_POST['lang'];
						$sub_url = $_POST['url'];
						$note = $_POST['note'];

						if(empty($lang_id)){
							$msg= "<font color=red ><b>Programming Language is Required!</b></font>";

						}

						else {

							$res = addProblemSubmission($userid,$pid,$lang_id,$sub_url,$note);
							echo $dberror;

							if($res){
								$msg= "<font color=green >Submission Saved!</font>";
							}
							else{
								$msg="An error has occured. Please try again.";
							}

						}

					}

					$table = "
					<h2>Record a solved problem below: </h2><br/>

					<table>

					<tr>
					<td></td>
					<td><font color='red'><b>$msg</b></font></td>
					</tr>
					<tr>
					<td><b>Code:</b></td>
					<td><a href=".$proburl.">".$code."</a></td>
					</tr>
					<tr>
					<td><b>Title:</b></td>
					<td><a href=".$proburl.">".$title."</a></td>
					</tr>
					<tr>
					<td><b>Platform:</b></td>
					<td><a href=".$pfurl.">".$platform."</a></td>
					</tr>
					<tr>
					<td><b>Level:</b></td>
					<td>".$level."</td>
					</tr>
					<tr>
					<td><b>Points:</b></td>
					<td>".$points."</td>
					</tr>

					";
					echo $table;

					echo "<form action='submit.php' method='post'>";

					echo "<tr>
					<td><b>Languages:</b></td>";

					echo "
					<td>
					<select name='lang'>
					<option value='' selected>Select one</option>";

					$result = getAllLanguages();
					while($row=mysqli_fetch_array($result)){
						echo "<option value=".$row['id']." >".$row['name']."</option>";
					}

					echo "</select>";	
					echo "</td></tr>";

					echo "<tr>
					<td><b>Submission url:</b></td>
					<td><input type='text' name='url' value='$sub_url' size='40'></td>
					</tr>
					";
					echo "<tr>
					<td><b>Note:</b></td>
					<td><input type='text' name='note' value='$note' size='40'></td>
					</tr>
					";

					echo "</table>";
					echo "<br>
					<input type='submit' name='record' value='Submit'>
					<input type='reset' name='reset' value='Reset'>
					<input type='hidden' name='hidden1' value=".$pid.">
					";


					echo "</form>";



					mysql_close();

				}
				else{
					echo "<p>Please login to access this page! <a href='login.php'>LogIn</a></p>";
				}
				?>


			</div>
		</div>

	</body>
</html>

