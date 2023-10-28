<html>
<?php
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

	//Street Name
	//Set up array to hold info and variables for read-in loop
	$arrayStreet=[];
	$numLines = 0;
	//Open/Close the file and get each line read in
	$streetNames=fopen("street_names.txt","r");
	while(!feof($streetNames)){
		$candidateLine = fgets($streetNames);
		if($candidateLine != ""){
			$candidateLine = str_replace("\r", "", $candidateLine);
			$candidateLine = str_replace("\n", "", $candidateLine);
			$streetNameLine[$numLines] = $candidateLine;
			$numLines++;
		}
	}				
	fclose($streetNames);
	//Separate each line into individual names and add them to the name list
	$nameNumber = 0;
	foreach($streetNameLine as $nameLine){
		$nameArray = explode(":", $nameLine);
		foreach($nameArray as $name){
			$arrayStreet[$nameNumber] = $name;
			$nameNumber++;
		}
	}

	//Street Type
	//Set up array to hold info and variables for read-in loop
	$arrayType=[];
	$numLines = 0;
	//Open/Close the file and get each line read in
	$streetType=fopen("street_types.txt","r");
	while(!feof($streetType)){
		$candidateLine = fgets($streetType);
		if($candidateLine != ""){
			$candidateLine = str_replace("\r", "", $candidateLine);
			$candidateLine = str_replace("\n", "", $candidateLine);
			$streetTypeLine[$numLines] = $candidateLine;
			$numLines++;
		}
	}				
	fclose($streetType);
	//Separate each line into individual names and add them to the name list
	$nameNumber = 0;
	foreach($streetTypeLine as $nameLine){
		$nameArray = explode("..;", $nameLine);
		foreach($nameArray as $name){
			$arrayType[$nameNumber] = $name;
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
	$DataFile = fopen("data.sql", "w");
	for ($i = 1; $i <= 150; $i++) {
		  $street = rand(1, 9999)." ".$arrayStreet[array_rand($arrayStreet)]." ".$arrayType[array_rand($arrayType)];
		  $city = getRandomLineFromFile('cities.txt');
		  $state = getRandomLineFromFile('states.txt');
		  $zip = rand(10000, 99999);
		  fputs($DataFile, "INSERT INTO `address` (`street`, `city`, `state`, `zip`) VALUES ('".$street."', "."'".$city."', '".$state."', '".$zip."')".";\n");
	}
	fclose($DataFile);

	//customer
	$DataFile = fopen("data.sql", "a");
	for ($i = 1; $i <= 100; $i++) {
		$firstName = $arrayFirst[array_rand($arrayFirst)];
		$lastName = getRandomLineFromFile('last_names.txt');
		$Emailname = $firstName.$lastName.rand(0,9999);
		$Email = $Emailname.$arrayDomain[array_rand($arrayDomain)];
		$phoneNumber = rand(100,999).'-'.rand(100,999).'-'.rand(1000,9999);
		fputs($DataFile, "INSERT INTO `customer` (`first_name`, `last_name`, `email`, `phone`, `address_id`) VALUES ('".$firstName."', "."'".$lastName."', "."'".$Email."', "."'".$phoneNumber."', "."'".$i."')".";\n");
	}
	fclose($DataFile);



	//order
	//no unique items, just get random integers as product keys
	//write to data.sql
	$DataFile = fopen("data.sql", "a");
	for($i = 1;$i <= 350; $i++){
		fputs($DataFile, "INSERT INTO `order` (`customer_id`, `address_id`) VALUES ('".rand(1, 100)."', "."'".rand(1, 150)."')".";\n");
	}
	fclose($DataFile);	


	//product
	$DataFile = fopen("data.sql", "a");
	for ($i = 1; $i <= 750; $i++) {
	    $productName = getRandomLineFromFile('adjectives.txt')." ".
						getRandomLineFromFile('adjectives.txt')." ".
						getRandomLineFromFile('colors.txt')." ".
						getRandomLineFromFile('materials.txt')." ".
						getRandomLineFromFile('nouns.txt');
	    $productdescription = "The ".$productName." is a must have item!";
	    $baseCost = (rand(2,7) *5);
		$baseCost = $baseCost + 0.99;
	    $randweight = rand(5,15);
	    //  $sql = "INSERT INTO address (, , , base_cost) VALUES ('$productName', '$productdescription', '$weight', '$')";
		fputs($DataFile, "INSERT INTO `product` (`product_name`, `description`, `weight`, `base_cost`) VALUES ('".$productName."', "."'".$productdescription."', "."'".$randweight."', "."'".$baseCost."')".";\n");
	}
	fclose($DataFile);
		
		
	//order_item
	$DataFile = fopen("data.sql", "a");
	for($i = 1;$i <= 550; $i++){
		fputs($DataFile, "INSERT INTO `order_item` (`order_id`, `product_id`, `quantity`, `price`) VALUES ('".rand(1,350)."', "."'".rand(1,750)."', "."'".rand(1, 100)."', "."'".((rand(2,7) *5) + .99)."')".";\n");
	}
	fclose($DataFile);	
	
	
	
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
	$DataFile = fopen("data.sql", "a");
	for($i = 1;$i <= 25; $i++){
		fputs($DataFile, "INSERT INTO `warehouse` (`name`, `address_id`) VALUES ('".$wareNames[$i-1]."', "."'".$i."')".";\n");
	}
	fclose($DataFile);	
	
	
	
	//product_warehouse
	//no unique items, just get random integers as product keys
	//write to data.sql
	$DataFile = fopen("data.sql", "a");
	for($i = 1;$i <= 25; $i++){
		for($j = 1;$j <= 50; $j++){
			fputs($DataFile, "INSERT INTO `product_warehouse` (`product_id`, `warehouse_id`) VALUES ('".rand(1,750)."', "."'".$i."')".";\n");
		}
	}
	fclose($DataFile);
	
	print("<h2>Success</h2>");

?>
</html>