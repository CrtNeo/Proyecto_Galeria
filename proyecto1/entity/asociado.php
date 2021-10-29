<?php
class Asociado 
{

    CONST RUTA_LOGOS = 'images/logo/';

    private $nombre;

    private $logo;

    private $descripcion;


    public function __construct(string $nombre, string $descripcion,string $logo){
            
        $this->nombre = $nombre;
        $this->logo = $logo;
        $this->descripcion = $descripcion;


    }
    public function getLogoImage(){
        return self::RUTA_LOGOS . $this->getLogo();
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of logo
     */ 
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set the value of logo
     *
     * @return  self
     */ 
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }
}