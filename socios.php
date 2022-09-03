<?php

use Persona as GlobalPersona;

ini_set("display_errors" ,1);
ini_set("display_startup_errors" ,1);
error_reporting(E_ALL);

abstract class Persona{
    protected $dni;
    protected $nombre;
    protected $correo;
    protected $celular;

    public function __construct($dni,$nombre,$correo,$celular)
    {
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->correo=$correo;
        $this->celular=$celular;

    }

  abstract public function imprimir();
   
}




?>