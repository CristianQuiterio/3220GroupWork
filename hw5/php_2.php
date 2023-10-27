<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "superstore";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Function to read random lines from a text file
function getRandomLineFromFile($filename) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    return $lines[array_rand($lines)];
}

//First Name
//Set up array to hold info and variables for read-in loop
$arrayFirst=[];
$numLines = 0;		
//Open/Close the file and get each line read in
$firstNames=fopen("first_names.csv","r");
while(!feof($firstNames)){
	$candidateLine = fgets($firstNames);
	if($candidateLine != ""){
		$candidateLine = str_replace("\r", "", $candidateLine);
		$candidateLine = str_replace("\n", "", $candidateLine);
		$firstNameLine[$numLines] = $candidateLine;
		$numLines++;
	}
}				
fclose($firstNames);		
//Separate each line into individual names and add them to the name list
$nameNumber = 0;
foreach($firstNameLine as $nameLine){
	$nameArray = explode(",", $nameLine);
	foreach($nameArray as $name){
		$arrayFirst[$nameNumber] = $name;
		$nameNumber++;
	}
}
	
//address	
//customer

for ($i = 1; $i <= 100; $i++) {
    $customerID = rand(10000,99999);
    $firtstName = getRandomLineFromFile('.txt');
    $lasttName = getRandomLineFromFile('.txt');
    $sql = "INSERT INTO address () VALUES ()";
    $conn->query($sql);}



for ($i = 1; $i <= 150; $i++) {
    $street = getRandomLineFromFile('streets.txt') . " Street";
    $city = getRandomLineFromFile('cities.txt');
    $state = getRandomLineFromFile('states.txt');
    $zip = rand(10000, 99999);
    $sql = "INSERT INTO address (street, city, state, zip) VALUES ('$street', '$city', '$state', '$zip')";
    $conn->query($sql);}
	
	//order

	//product

for ($i = 1; $i <= 750; $i++) {
    $productName = getRandomLineFromFile('nouns.txt');
    $adjective1 = getRandomLineFromFile('adjectives.txt');
    $adjective2 = getRandomLineFromFile('adjectives.txt');
    $color = getRandomLineFromFile('colors.txt');
    $material= getRandomLineFromFile('materials.txt');
    $verb= getRandomLineFromFile('verbs.txt');
    $productdescription = "A $adjective1 $productName in an $adjective2 $color made of $material useful for $verb";
    $baseCost=(rand((2,7)*5)+.99;
    $randweight=rand((5,15);
    $weight="$randweight lbs";
    $sql="INSERT INTO address (product_name, description, weight, base_cost) VALUES ('$productName', '$productdescription', '$weight', '$baseCost')";
    $conn->query($sql);
	
	//order_item
	//warehouse
	
	//product_warehouse
	$DataFile = fopen("data.sql", "w");
	for($i = 0;$i < 25; $i++){
		for($j = 0;$j < 50; $j++){
			fputs("INSERT INTO `product_warehouse` (`product_id`, `warehouse_id`) VALUES (".rand(0,749).", ".$j.")");
		}
	}
	fclose($DataFile);
}

