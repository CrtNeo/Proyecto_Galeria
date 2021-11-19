<?php

$alumnos = ["Willy" => "Gafas", "Raimon" => "Rubio palido", "Gerard" => "Viejo Mugroso"];

function comparar($a, $b) {
    return strlen($a) - strlen($b);
}

uasort($alumnos, 'comparar');
print_r($alumnos);

?>