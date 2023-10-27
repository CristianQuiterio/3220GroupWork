<html>
<?php
// Function to read random lines from a text file
function getRandomLineFromFile($filename) {
   // $lines = file($filename, FILE_IGNORE_NEW_LINES);
    //return $lines[array_rand($lines)];
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

//Domain Name
//Set up array to hold info and variables for read-in loop
$arrayDomain=[];
$numLines = 0;
//Open/Close the file and get each line read in
$domainNames=fopen("domains.txt","r");
while(!feof($domainNames)){
	$candidateLine = fgets($domainNames);
	if($candidateLine != ""){
		$candidateLine = str_replace("\r", "", $candidateLine);
		$candidateLine = str_replace("\n", "", $candidateLine);
		$domainNameLine[$numLines] = $candidateLine;
		$numLines++;
	}
}				
fclose($domainNames);
$nameNumber = 0;
foreach($domainNameLine as $nameLine){
	$nameArray = explode(".", $nameLine);
	foreach($nameArray as $name){
		if(($nameNumber%2)== 0){
			$arrayDomain[$nameNumber] = $name.".".$nameArray[$nameNumber+1];
		}
		$nameNumber++;
	}
}

//address
for ($i = 1; $i <= 150; $i++) {
    $street = getRandomLineFromFile('streets.txt') . " Street";
    $city = getRandomLineFromFile('cities.txt');
    $state = getRandomLineFromFile('states.txt');
    $zip = rand(10000, 99999);
    $sql = "INSERT INTO address (street, city, state, zip) VALUES ('$street', '$city', '$state', '$zip')";
	}

//customer

for ($i = 1; $i <= 100; $i++) {
    $firstName = array_rand($arrayFirst);
    $domain = array_rand($arrayDomain);
    $lastName = getRandomLineFromFile('.txt');
    $names=[];
    $names[0] = $firstName;
    $names[1] = $lastName;
    $Emailname = array_rand($names);
    $Email = "$Emailname.$domain"; 
    $sql = "INSERT INTO address (first_name, last_name, email, phone) VALUES ('$firstName','$lastName','','')";
    $conn->query($sql);}




//order


	//product

for ($i = 1; $i <= 750; $i++) {
    $productName = getRandomLineFromFile('nouns.txt');
    $adjective1 = getRandomLineFromFile('adjectives.txt');
    $adjective2 = getRandomLineFromFile('adjectives.txt');
    $color = getRandomLineFromFile('colors.txt');
    $material = getRandomLineFromFile('materials.txt');
    $verb = getRandomLineFromFile('verbs.txt');
    $productdescription = "A $adjective1 $productName in an $adjective2 $color made of $material useful for $verb";
    $baseCost = ((rand((2,7))*5)+.99);
    $randweight = rand(5,15);
    $weight = "$randweight lbs";
    $sql = "INSERT INTO address (product_name, description, weight, base_cost) VALUES ('$productName', '$productdescription', '$weight', '$baseCost')";
    $conn->query($sql);
	
	//order_item
	
	
	
	
	
	//warehouse
	//Set up array to hold info and variables for read-in loop
	$wareNames =[];
	$numLines = 0;		
	//Open/Close the file and get each line read in
	$ReadFile = fopen("warehouse_names.txt", "r");
	while(!feof($ReadFile)){
		$candidateLine = fgets($ReadFile);
		if($candidateLine != ""){
			$candidateLine = str_replace("\r", "", $candidateLine);
			$candidateLine = str_replace("\n", "", $candidateLine);
			$wareNames[$numLines] = $candidateLine;
			$numLines++;
		}
	}				
	fclose($ReadFile);
	
	//write to data.sql
	$DataFile = fopen("data.sql", "w");
	for($i = 0;$i < 25; $i++){
		fputs($DataFile, "INSERT INTO `warehouse` (`name`, `address_id`) VALUES (".$wareNames[$i].", ".$i.")");
	}
	fclose($DataFile);	
	
	
	
	//product_warehouse
	//no unique items, just get random integers as product keys
	//write to data.sql
	$DataFile = fopen("data.sql", "w");
	for($i = 0;$i < 25; $i++){
		for($j = 0;$j < 50; $j++){
			fputs($DataFile, "INSERT INTO `product_warehouse` (`product_id`, `warehouse_id`) VALUES (".rand(0,749).", ".$j.")");
		}
	}
	fclose($DataFile);
	
	print("<h2>Success</h2>");

?>
</html>