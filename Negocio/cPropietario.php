<?php

class Propietario
{

    private int $id;
    private string $nombre;
    private string $dni;
    private string $direccion;
    private int $telefono;
    private string $email;
    
    
    function __construct()
    {
        
    }

    function init($id, $nombre, $dni, $direccion, $telefono, $email)
    {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->dni = $dni;
        $this->$direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;

    }

    function unserializePropietarios($fichero)
    {
        $fichero = json_decode($fichero);
        $lista_propietarios = [];

        foreach ($fichero as $tmpProp) {
            $prop  = new Propietario();
            $prop->init($tmpProp->id,$tmpProp->dni, $tmpProp->nombre, $tmpProp->direccion, $tmpProp->telefono, $tmpProp->email);

            $lista_propietarios[] = $prop;
        }

        return $lista_propietarios;
    }


    function getID()
    {
        return $this->id;
    }

    function getNombre()
    {
        return $this->nombre;
    }

}