<?php

require_once __DIR__ . '/../entity/Mensaje.php';

require_once __DIR__ . '/../database/QueryBuilder.php';


class MensajeRepository extends QueryBuilder

{
    public function __construct(){

        parent::__construct('mensajes', 'Mensaje');

    }

    public function save(Entity $Mensaje){

        $fnGuardaMensaje = function () use ($Mensaje){
            parent::save($Mensaje);
        };
        $this->executeTransaction($fnGuardaMensaje);
     }
}