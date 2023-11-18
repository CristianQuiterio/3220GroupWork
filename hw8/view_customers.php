<html>
<head>
<title></title>
</head>
<body>
<h1></h1>
<a href = "manager.html"> Back </a>
<?php
<li><a href="http://localhost/3220/hw08/manager.html">Home Page</a>

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
or die ('Could not connect to the database server' . mysqli_connect_error());
$stmt = $mysqli->prepare("SELECT last_name, first_name, address, phone, district FROM customer inner JOIN address ON customer.address_id = address.address_id");
$stmt->bind_param("si", $_POST['name'], $_POST['age']);
$stmt->execute();
$stmt->bind_result($lname, $fname, $address, $phone, $district);

while ($stmt->fetch()) {
printf("%s, %s, %s, %s\n",
$lname, $fname, $address, $phone, $district);
}

$stmt->close();



?>
</body>
</html>
