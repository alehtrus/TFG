<?php

class Veterinario {

    private string $nombre;
    private string $direccion;
    private string $municipio;
    private string $telefono;
    private string $email;
    
    function __construct($nombre, $direccion, $municipio, $telefono, $email)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->municipio = $municipio;
        $this->telefono = $telefono;
        $this->email = $email;
    }



    function pintarVeterinario(){
        
    }



    function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function getDireccion()
    {
        return $this->direccion;
    }

    function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    function getMunicipio()
    {
        return $this->municipio;
    }

    function setMunicipio($municipio)
    {
        $this->municipio = $municipio;
    }

    function getTelefono()
    {
        return $this->telefono;
    }

    function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }






}