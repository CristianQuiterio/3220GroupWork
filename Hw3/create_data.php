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
		
		//Show that the names correctly separated - deleted later, just showing it works
		$check=0;
		foreach($arrayFirst as $name){
			print($check.$name."<br>");
			$check++;
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
		
		//Already separated in the list		
		//Show that the names correctly separated - deleted later, just showing it works
		$check = 0;
		foreach($arrayLast as $name){
			
			print($check.$name."<br>");
			$check++;
		}
		print("<p>$arrayFirst[0]</p>");
		print("<p>$arrayLast[2]</p>");

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
		
		//Show that the names correctly separated - deleted later, just showing it works
		$check=0;
		foreach($arrayStreet as $name){
			print($check.$name."<br>");
			$check++;
		}
		print("<p>$arrayStreet[0]</p>");

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
		
		//Show that the names correctly separated - deleted later, just showing it works
		$check=0;
		foreach($arrayType as $name){
			print($check.$name."<br>");
			$check++;
		}
		print("<p>$arrayType[0]</p>");

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
		
		//Show that the names correctly separated - deleted later, just showing it works
		$check=0;
		foreach($arrayDomain as $name){
			print($check.$name."<br>");
			$check++;
		}	
		
	?>
</html>