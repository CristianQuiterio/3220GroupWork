<!DOCTYPE html>
<html>
<head>
	<title>Add Film PHP</title>
	<link rel="styleSheet" href="sample.css" type="text/css" media="all">
</head>
<body>
<h1></h1>
<?php
try{

$mysqli = new mysqli("localhost", "root", "", "sakila");
if($mysqli->connect_error) {
exit('Error connecting to database'); //Should be a message a typical user could understand in production
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli->set_charset("utf8mb4");

$stmt = $mysqli->prepare("INSERT INTO sakila.film (title,description,release_year,language_id,rental_duration,rental_rate,length,replacement_cost,rating,special_features) VALUES (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('ssisididss', $_POST['title'], $_POST['description'], $_POST['releaseYear'], $_POST['langID'], $_POST['rentDuration'], $_POST['rentRate'], $_POST['length'], $_POST['repCost'], $_POST['rating'], $_POST['special_features']);
$stmt->execute();

if($stmt->affected_rows === 0) exit('No rows updated');
$stmt->close();
$mysqli->close();

print ("Success!!<br>");
print("<form action = ".'manager.html'." method = ".'post'." >
<input type = ".'submit'." value = ".'Add Film'." >
</form>");
} catch(Exception $e) {
print ("An Error Has Occured. Did not add to the DB!!<br>");
print("<form action = ".'manager.html'." method = ".'post'." >
<input type = ".'submit'." value = ".'Add Film'." >
</form>");
}



?>
</body>
</html>