<!--first page for record submission-->
<!DOCTYPE html>

<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet'>
		<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp2/css/bootstrap.min.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
	</head>

	<body>
		
<?php
include "db/db.php";
connectDB('zyt144','zengyuting');
$res = addUser('bowen','test','slkj','sdfl@edu',5);
?>

		<?php include 'menu.php'; ?>

		<div class="jumbotron">
			<div class="container">


				<h1>Welcome To ProgFarm!</h1><br/>
				<p>Online platform for programming practice management - A system to keep control of your solved problems.</p>


			</div>
		</div>

	</body>
</html>
