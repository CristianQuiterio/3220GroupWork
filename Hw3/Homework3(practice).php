<html>
	<?php
		$arrayFirst=[];
		$numLines = 0;
		$notEOF = True;
		//Open/Close the file and get each line read in
		$firstNames=fopen("first_names.csv","r");
		while($notEOF){		
			$firstNameLine[$numLines] = fgets($firstNames);
			$numLines++;
			$notEOF = !feof($firstNames);
		}				
		fclose($firstNames);
		
		//Separate each line into individual names and add them to the name list
		$nameNumber = 0;
		foreach($firstNameLine as $nameLine){
			$nameArray = explode(",", $nameLine);
			foreach($nameArray as $name){
				$firstName[$nameNumber] = $name;
				$nameNumber++;
			}
		}
		
		//Show that the names correctly separated - deleted later, just showing it works
		foreach($firstName as $name){
			print($name."<br>");
		}
		
//		$arrayLast=[]
//		$lastNames=fopen("last_names.txt","r");
//		for ($i = 0; $i < 24; $i++){
//			$arrayLast[$i]=[fgets($lastNames)];
//		}
//		fclose($lastNames);
//		print("<p>$arrayLast</p>");

	?>
</html>