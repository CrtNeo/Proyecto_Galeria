<?php

$palabras = ["Tubería","Guion","Mimbre","Análisis","Uno"];

$palabraMax = max($palabras);

$palabraMin = min($palabras); 

$cuantasMax = strlen($palabraMax);

$cuantasMin = strlen($palabraMin);



echo "La palabra mas corta es ". $palabraMax . " y tiene " . $cuantasMax . " caracteres";

echo "<br><br>";

echo "La palabra mas larga es ". $palabraMin . " y tiene " . $cuantasMin . " caracteres";
?>