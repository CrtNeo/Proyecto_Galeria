<?php

function rand_Pass($upper = 1, $lower = 5, $numeric = 3, $other = 2){
    $cadena = "";
    
    for($i = 0; $i<$upper; $i++){
        $cadena .= chr(rand(65, 90));
    }
    for($i = 0; $i<$lower; $i++){
        $cadena .= chr(rand(97, 122));
    }
    for($i = 0; $i<$numeric; $i++){
        $cadena .= chr(rand(48, 57));
    }
    for($i = 0; $i<$other; $i++){
        $cadena .= chr(rand(33, 47));
    }

    return str_shuffle($cadena);
}

echo rand_Pass();
?>