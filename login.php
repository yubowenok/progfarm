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
					echo "You are already logged in as <b>$username</b>! <br>Click <a href='mine.php'>HERE</a> for the member page.";
				}
				else{


					//echo "<h3>Please log in here: </h3><br/>";

					$form = "<form action='login.php' method='post'>
					<h3>Please log in here: </h3><br/>
					
					<table>

					<tr>
					<td>Username:</td>
					<td><input type='text' name='user'></td>
					</tr>
					<tr>
					<td>Password:</td>
					<td><input type='password' name='password'></td>
					</tr>
					<tr>
					<td></td>
					<td><input type='submit' name='submit' value='Login'></td>
					</tr>

					</table>
					</br>
					<p>Do not have an account? Register <a href='signup.php'>HERE</a>!</p> 
					</form>";

					if($_POST['submit']){
						$user=$_POST['user'];
						$psw=$_POST['password'];

						if($user){
							if($psw){
								include 'db/db.php';
								connectDB('zyt144','zengyuting');


								$dbid=authenticateUser($user,$psw);								
								

								if($dbid>=0){
									$result = getUserById($dbid);
									$info = mysqli_fetch_array($result);
									$dbuser=$info['username'];

									$_SESSION['user_id']=$dbid;
									$_SESSION['username'] = $dbuser;

									echo "<font color=green>You have been logged in as <b>$dbuser</b>!</font>";
								}
								else{
									echo "<font color=red><b>Password is incorrect OR Username does not exist!</b></font> $form";
								}


								mysql_close();
							}
							else{
								echo "<font color=red>Please enter your password!</font>$form";
							}
						}
						else{
							echo "<font color=red>Please enter your username!</font>$form";
						}

					}
					else {
						echo $form;
					}
				}

				?>

			</div>
		</div>

	</body>
</html>

