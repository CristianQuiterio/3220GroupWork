<html>
<head>
	<title>Customers</title>
	<link rel="styleSheet" href="sample.css" type="text/css" media="all">
</head>
<body>
<h1>Sakila Data Base</h1>
<form action = "manager.html" method = "post" >
<input type = "submit" value = "Home" >
</form>
<?php
try{
$mysqli = new mysqli("localhost", "root", "", "sakila");
if($mysqli->connect_error) {
exit('Error connecting to database'); //Should be a message a typical user could understand in production
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli->set_charset("utf8mb4");

$stmt = $mysqli->prepare("SELECT last_name, first_name, address, phone, district, title FROM customer inner JOIN address ON customer.address_id = address.address_id inner JOIN rental on customer.customer_id = rental.customer.id inner JOIN inventory on rental.inventory_id = inventory.inventory_id inner JOIN film on inventory.film_id =film.film_id ORDER BY last_name");
$stmt->execute();
$stmt->bind_result($lname, $fname, $address, $phone, $district, $title);


//make the table header
print "<table>";
print "<h2>Customer Data </h2>";
print "<table border = '.5'>";
Print ("<tr><th>Last Name</th><th>First Name</th><th>Address</th><th>Phone Number</th><th>District</th><th>Titles Rented</th></tr>");
//print the table out

while ($stmt->fetch()) {
  print "<td>".$lname."</td>";
  print "<td>".$fname."</td>";
  print "<td>".$address."</td>";
  print "<td>".$phone."</td>";
  print "<td>".$district."</td>";
  print "<td>".$title."</td>";
  print "</tr>";
}
print "</table>";

$stmt->close();


}catch(Exception $e) {
print ("An Error Has Occured. Did not find the DB!!<br>");
}
?>
</body>
</html>
