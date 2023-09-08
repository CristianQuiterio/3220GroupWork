<html>
<head>
<title>Random Array Maker with Statistics</title>
<link rel ="stylesheet" type="text/css" href="sample.css" >
</head>
<body>
<h1>Random Array Maker with Statistics</h1>
<a href = "arrayDemo.html"> Back </a>
<?php
//Carry over variables
$numRows = $_POST['numRows'];
$numCols = $_POST['numCols'];
$minValue = $_POST['minValue'];
$maxValue = $_POST['maxValue'];

//Array
$arrayData = [];
//Filling array with random values
for ($i = 0; $i < $numRows; $i++){
  $arrayData[$i]= [];
  for ($j = 0; $j < $numCols; $j++) {
    $arrayData[$i][$j] = rand($minValue, $maxValue);
  }
}

//Initial Array Statistics
print "<br><br><h2>Input Values</h2>";
print "<li>Your array size is: ".$numRows." x ".$numCols."</li>";
print "<li>Your minimum possible value is: ".$minValue."</li>";
print "<li>Your maximum possible value is: ".$maxValue."</li>";

//Printing
print "<h2> Imputed Data</h2>";
print "<table border = '.5'>";
foreach ($arrayData as $numRow){
  print "<tr>";
  foreach ($numRow as $num){
    print "<td>" . $num . "</td>";
  }
  print "</tr>";
}
print "<table>";

//Process the data and print in 2nd table
print "<h2>Row Stats </h2>";
print "<table border = '.5'>";
Print "<tr><th>Row</th><th>Sum</th><th>Average</th><th>Standard Deviation</th></tr>";
foreach ($arrayData as $i => $numRows){
  $rowNum = $i + 1;
  $sum = array_sum($numRows);
  $average = $sum / $numCols;
  $standardDev = 0;

  foreach ($numRow as $value) {
    $standardDev += pow($value - $average, 2);
  }
  $standardDev = sqrt($standardDev / $numCols);
  print "<td>".$rowNum."</td>";
  print "<td>".$sum."</td>";
  print "<td>".number_format($average, 3)."</td>";
  print "<td>".number_format($standardDev, 3)."</td>";
  print "</tr>";
}
print "</table>";

//Create 3rd table and display if element is positive or negative
print "<h2>Number Sign</h2>";
print "<table border = '.5'>";
foreach ($arrayData as $numRows){
  //Relist the number
  print "<tr>";
  foreach ($numRows as $num){	
    print "<td>".$num."</td>";
  }
  //Check for the sign
  print "</tr><tr>";
  foreach ($numRows as $num){
	if($num>0){
    print "<td>Positive</td>";
	} 
	elseif($num<0){
	print "<td>Negative</td>";
	} 
	else {
	print "<td>Zero</td>";
	}	
  }
  
  print "</tr>";
}
print "</table>";

?>
</body>
</html>