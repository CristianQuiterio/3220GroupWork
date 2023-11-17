<!DOCTYPE html>
<html>
<head>
	<title>Add Film PHP</title>
	<link rel="styleSheet" href="sample.css" type="text/css" media="all">
</head>
<body>
<h1></h1>
<?php
$mysqli = new mysqli("localhost", "root", "", "sakila");
if($mysqli->connect_error) {
exit('Error connecting to database'); //Should be a message a typical user could understand in production
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli->set_charset("utf8mb4");



$mysqli->close();

print ("Success!!");
?>
</body>
</html>