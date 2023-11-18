<html>
<head>
<title>Customers</title>
<li><a href="http://localhost/3220/hw08/manager.html">Home Page</a>

</head>
<body>
<h1></h1>
<a href = "manager.html"> Back </a>
<?php
try{
$mysqli = new mysqli("localhost", "root", "", "sakila");
if($mysqli->connect_error) {
exit('Error connecting to database'); //Should be a message a typical user could understand in production
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli->set_charset("utf8mb4");

$stmt = $mysqli->prepare("SELECT last_name, first_name, address, phone, district FROM customer inner JOIN address ON customer.address_id = address.address_id");
$stmt->execute();
$stmt->bind_result($lname, $fname, $address, $phone, $district);

while ($stmt->fetch()) {
printf("%s, %s, %s, %s\n",
$lname, $fname, $address, $phone, $district);
}

$stmt->close();


}catch(Exception $e) {
print ("An Error Has Occured. Did not add to the DB!!<br>");
print("<form action = ".'manager.html'." method = ".'post'." >
<input type = ".'submit'." value = ".'Add Film'." >
</form>");
}
?>
</body>
</html>
