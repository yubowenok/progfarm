<?php
error_reporting(E_ALL ^ E_NOTICE);
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

				if($_POST['submit']){
						$getuser=$_POST['user'];
						$getpsw=$_POST['password'];
						$getconpsw=$_POST['conpassword'];
						$getname=$_POST['name'];
						$getemail = $_POST['email'];

						if($getuser){
							if($getemail){
								if($getpsw){
									if($getconpsw){
										if($getpsw===$getconpsw){
											//'===' means exactly equal(including capitalization)
											
											if((strlen($getemail)>=7) && (strstr($getemail,"@")) && (strstr($getemail, "."))){
												
												include 'db/db.php';
												connectDB('zyt144','zengyuting');
												
												
												//check if this username exists already
												if(existUsername($getuser)==false){
													if(existUserEmail($getemail)==false){
														
														addUser($getuser,$getpsw,$getname,$getemail,0);
														
															
															//check again to see if it's added
															if(existUsername($getuser)){
																$msg="<font color='green'>Your account has been created successfully!</font> <a href='login.php'>LogIn</a>";
															}
															else 
																$msg="An error has occured. Please try again.";
															
													}
													else{
														$getemail=NULL;
														$msg= "Username already exists! Please pick another one.";
													}
												}
												else{
													$getuser=NULL;
													$msg= "Username already exists! Please pick another one.";
												}
												
												mysql_close();
												
												
												
											}
											else
												$msg="You must enter a valid email address! Example: name@gmail.com";
											
											
										}
										else
											$msg="The two passwords you entered did not match!";
									}
									else{
										$msg="You must confirm your password!";
									}
								}
								else{
									$msg="You must enter a password!";
								}
								
							}
							else{
								$msg="You must enter your email!";
							}
						}
						else{
							$msg="You must enter an username!";
						}

					}

					echo "<h2>Create Your Progfarm today. </h2><br/>";

					$form = "<form action='signup.php' method='post'>
					<table>
					
						<tr>
							<td></td>
							<td><font color='red'><b>$msg</b></font></td>
						</tr>
						<tr>
							<td>Choose your Username:</td>
							<td><input type='text' name='user' value='$getuser'></td>
						</tr>
						<tr>
							<td>Set your Password:</td>
							<td><input type='password' name='password'></td>
						</tr>
						<tr>
							<td>Confirm your Password:</td>
							<td><input type='password' name='conpassword'></td>
						</tr>
						<tr>
							<td>Your Full Name:</td>
							<td><input type='text' name='name' value='$getname'></td>
						</tr>
						
						<tr>
							<td>Your Email:</td>
							<td><input type='text' name='email' value='$getemail'></td>
						</tr>
						
						<tr>
							<td></td>
							<td><input type='submit' name='submit' value='Sign Up'></td>
						</tr>
			
					</table>
					</form>";

					echo $form;


				?>

			</div>
		</div>

	</body>
</html>

