<!--first page for record submission-->
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
					<li><a href="submit.php">Submit</a></li>
					<li><a href="solved.php">Solved</a></li>

					<li><a href="#"> Sign Up </a></li>
					<li><a href="#"> Log In </a></li>
					<li><a href="help.php"> Help </a></li>


				</ul>
			</div>
		</div>

		<div class="jumbotron">
			<div class="container">


				<h2>Record a solved problem below: </h2><br/>

				<form action="submit_status.php" method=post>

					Choose the Source Website:
					<select name="web">
						<option value="" selected>Select one</option>
						<option value="cf" >CodeForces</option>
						<option value="uva">UVA</option>
						<option value="poj" >POJ</option>
						<option value="codechef">CodeChef</option>
						<option value="other">Other</option>
					</select>
					<br/>
					If "other", please specify:
					<input type="text" name="webother">
					<br/><br/>

					Choose the Programming Language:
					<select name="lang">
						<option value="" selected>Select one</option>
						<option value="java" >Java</option>
						<option value="cpp">C++</option>
						<option value="python">Python</option>
						<option value="other">Other</option>
					</select>
					<br/>
					If "other", please specify:
					<input type="text" name="langother">
					<br/><br/>

					Paste your code here:<br/>
					<textarea rows="20" cols="80" name="code">
					</textarea><br/>
					<input type="submit" name="submit" value="Submit">
					<input type="reset" name="reset" value="Reset">

				</form>


			</div>
		</div>

	</body>
</html>

