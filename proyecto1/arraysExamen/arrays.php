<DOCTYPE html>
<html>
<body>
<?php

$nombres = ["alejandro", "cesar", "raimon", "victor"];
echo "El numero de elementos del array es: " . count($nombres);
echo "<br>";

echo "Los elementos del array son: " . implode(", ", $nombres);

echo "<br>";

asort($nombres);

foreach($nombres as $nombre){
    echo "$nombre\n";
}
echo "<br>";

$invertir = array_reverse($nombres);

foreach($invertir as $valor){
    echo "$valor\n";
}

echo "<br>";

$invertir = array_search('cesar', $nombres);

echo "La posicion de mi nombre es: " . $invertir;

echo "<br>";

$nombres = [
    'alumno1' => ['1', 'alejandro', '18'],
    'alumno2' => ['2', 'cesar', '19'],
    'alumno3' => ['3', 'raimon', '19'],
];

echo "<br>";

echo "<table border=1>";

foreach($nombres as $alumno => $datos){
     echo '<tr>';
        foreach($datos as $personas){
         echo '<td>'. $personas . '<td>';
        }
        echo "<tr>";
}
echo "</table>";

echo "<br>";

$nombres = [
    [
        'id' => 1,
        'nombre' => 'alejandro',
        'edad' => '18',
    ],
    [
        'id' => 2,
        'nombre' => 'cesar',
        'edad' => '19',
    ],
    [
        'id' => 3,
        'nombre' => 'raimon',
        'edad' => '19',
    ]
];

$columnaNombres = array_column($nombres, 'nombre');
print_r($columnaNombres);

echo "<br>";

$numeros = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10',];
echo "La suma de los numeros es: ";
print_r(array_sum($numeros));



?>
</body>
</html>