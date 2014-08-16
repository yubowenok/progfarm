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

<?php
if(isset($_POST['submit'])){

if(empty($_POST['web'])||
($_POST['web']=="other"&&empty($_POST['webother']))){
echo "<h2><font color=red >Source Website is Required!</font></h2><br/>";
echo  "<a href=submit.php>Submit again</a>";
}
else if(empty($_POST['lang'])||
($_POST['lang']=="other"&&empty($_POST['langother']))){
echo "<h2><font color=red >Programming Language is Required!</font></h2><br/>";
echo  "<a href=submit.php>Submit again</a>";
}

else {
echo "<h2><font color=green >Problem Saved!</font></h2><br/>";
echo  "<a href=submit.php> Go Back</a>";
/*insert data to DB here - example below:
$AddQuery="INSERT into table (Website,Language,Code) VALUES ('$_POST[web]','$_POST[lang]','$_POST[code]'";
mysql_query($AddQuery,$con);
*/

}

}
?>





</div>
</div>

</body>
</html>