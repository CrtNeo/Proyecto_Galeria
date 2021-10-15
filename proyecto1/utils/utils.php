
<?php
function esOpcionMenuActiva($option){
    if ($_SERVER["REQUEST_URI"] == $option){
        return true;
    }else{
        return false;
    }
}

function  existeOpcionMenuActivaEnArray($options){
    foreach($options as $option){
        esOpcionMenuActiva($option);
    }
}
?>