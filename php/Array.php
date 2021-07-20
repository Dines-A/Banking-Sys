<?php
// array

$array1=array(1,2,3,4,5,6,7,8,);
echo "<h2> $array1[0]</h2>";
echo "<h2> $array1[6]</h2>";
$size=count($array1);
echo "<h2>Length of array : $size </h2>";

for($i=0 ; $i<=$size ; $i++)
{
    echo "<h1> $array1[$i] </h1>";
}
?>

<?php
$cars = array("Volvo", "BMW", "Toyota");
$arrlength = count($cars);

for($x = 0; $x < $arrlength; $x++) {
  echo $cars[$x];
  echo "<br>";
}
?>