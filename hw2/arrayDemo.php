<html>
<head>
<title>Random Array Maker with Statistics</title>
<link rel ="stylesheet" type="text/css" href="sample.css" >
</head>
<body>
<h1>Random Array Maker with Statistics</h1>
<a href = "arrayDemo.html"> Back </a>
<?php
$numRows = $_POST['numRows'];
$numCols = $_POST['numCols'];
$minValue = $_POST['minValue'];
$maxValue = $_POST['maxValue'];
//$exampleInteraction = $minValue * $maxValue;
//print("<p>This page is under development.</p>");
//print("<p>You entered $numRows, $numCols, $minValue, and $maxValue</p>");

//Array
$arrayData = [];
//Filling array with random values
for ($i = 0; $i < $numRows; $i++){
  $arrayData = [$i];
  for ($j = 0; $j < $numCols; $j++) {
    $arrayData[$i][$j] = rand($minValue, $maxValue);
  }
}

//Printing
print "<h2> Inputed Data</h2>";
print "<table border = '.5'>";
foreach ($arrayData as $numRow){
  print "<tr>";
  foreach ($numRow as $num){
    print "<td>" . number_format($num, 3) . "</td>";
  }
  print "</tr>";
}
print "<table>";

//Process the data and print in 2nd table
print "<h2>Row Stats </h2>";
print "<table border = '.5'>";
Print "<tr><th>Row</th><th>Sum</th><th>Average</th><th>Standard Deviation</th></tr>";
foreach ($arrayData as $i => $numRows){
  $sum = array_sum($numRows);
  $average = $sum / $numCols;
  $standardDev = 0;

  foreach ($numRow as $value) {
    $standardDev += pow($value - $average, 2);
  }
  $standardDev = sqrt($standardDev / $numCols);
  

}

?>
</body>
</html>
