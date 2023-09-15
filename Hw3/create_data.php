<html>
	<?php
		//First Name
		//Set up array to hold info and variables for read-in loop
		$arrayFirst=[];
		$numLines = 0;		
		//Open/Close the file and get each line read in
		$firstNames=fopen("first_names.csv","r");
		while(!feof($firstNames)){
			$candidateLine = fgets($firstNames);
			if($candidateLine != ""){
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
		
		//Last Name
		//Set up array to hold info and variables for read-in loop
		$arrayLast=[];
		$numLines = 0;
		//Open/Close the file and get each line read in
		$lastNames=fopen("last_names.txt","r");
		while(!feof($lastNames)){		
			$candidateLine = fgets($lastNames);
			if($candidateLine != ""){
				$arrayLast[$numLines] = $candidateLine;
				$numLines++;
			}
		}				
		fclose($lastNames);

		//Street Name
		//Set up array to hold info and variables for read-in loop
		$arrayStreet=[];
		$numLines = 0;
		//Open/Close the file and get each line read in
		$streetNames=fopen("street_names.txt","r");
		while(!feof($streetNames)){
			$candidateLine = fgets($streetNames);
			if($candidateLine != ""){
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
				$domainNameLine[$numLines] = $candidateLine;
				$numLines++;
			}
		}				
		fclose($domainNames);
		//Separate each line into individual names and add them to the name list
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
		
		//Print the information in the arrays
		print("<h2>First Names</h2>");
		$check=0;
		foreach($arrayFirst as $name){
			print_r("<pre>".$name."</pre>");
			$check++;
		}

		print("<h2>Last Names</h2>");
		$check=0;
		foreach($arrayLast as $name){
			print_r("<pre>".$name."</pre>");
			$check++;
		}
		
		print("<h2>Street Names</h2>");
		$check=0;
		foreach($arrayStreet as $name){
			print_r("<pre>".$name."</pre>");
			$check++;
		}

		print("<h2>Street Types</h2>");
		$check=0;
		foreach($arrayType as $name){
			print_r("<pre>".$name."</pre>");
			$check++;
		}	
		
		print("<h2>Domain Names</h2>");
		$check=0;
		foreach($arrayDomain as $name){
			print_r("<pre>".$name."</pre>");
			$check++;
		}
		
		//Arrays with the information that was read in: 
		//$arrayFirst
		//$arrayLast
		//$arrayStreet
		//$arrayType
		//$arrayDomain
		
		//Randomized Info 
		$customerData = [];
		$usedNames = [];
		$usedAddress = [];

		While (count($customerData) < 25){
			$firstName = $arrayFirst[array_rand($arrayFirst)];
			$lastName = $arrayLast[array_rand($arrayLast)];
			$fullName = $firstName. ' ' . $lastName;
			$street = rand(1,9999) . ' ' . $arrayStreet[array_rand($arrayStreet)] . ' ' . $arrayType[array_rand($arrayType)];

			//Check to see if the names are unique to avoid duplicates
			if (!in_array($fullName, $usedNames) && !in_array($street, $usedAddress)){
				$usedNames[] = $fullName;
				$usedAddress[] = $street;

				$domain = $arrayDomain[array_rand($arrayDomain)];
				$email = strtolower($firstName) . '.' . strtolower($lastName) . '@' . $domain;
				

				//add the random data to the customerData array
				$customerData[] = [
					'First Name' => $firstName,
					'Last Name' => $lastName,
					'Email' => $email,
					'Address' => $street,
				];
			}
		}
		
		//Table
		print '<table border="1">';
		print '<tr>';
		print '<th>First Name</th>';
		print '<th>Last Name</th>';
		print '<th>Street</th>';
		print '<th>Email</th>';
		print '</tr>';
		//Fill the table with data from customerData[]
		foreach ($customerData as $customer) {
			print '<tr>';
			print '<td>' . $customer['First Name'] . '</td>';
			print '<td>' . $customer['Last Name'] . '</td>';
			print '<td>' . $customer['Address'] . '</td>';
			print '<td>' . $customer['Email'] . '</td>';
			print '</tr>';
		}
		
		//Output Info to a File
		
		print("<h2>Customer Info</h2>");
		$check=0;
		foreach($customerData as $name){
			
			print_r("<pre>".$name['First Name']."</pre>");
			print_r("<pre>".$name['Last Name']."</pre>");
			print_r("<pre>".$name['Email']."</pre>");
			print_r("<pre>".$name['Address']."</pre>");
			$check++;
		}
	?>
</html>
