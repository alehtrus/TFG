<?php

class Veterinario {

    private string $nombre;
    private string $direccion;
    private string $municipio;
    private string $telefono;
    private string $email;
    
    function __construct()
    {
        
    }

    function init($nombre, $direccion, $municipio, $telefono, $email)
    {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->municipio = $municipio;
        $this->telefono = $telefono;
        $this->email = $email;
    }


    function unserializeVeterinarios($fichero)
    {
        $fichero = json_decode($fichero);
        $lista_veterinarios = [];

        foreach($fichero as $veterinario){
           $vet = new Veterinario();
           $vet->init($veterinario->nombre,$veterinario->direccion,$veterinario->municipio,$veterinario->telefono,$veterinario->email);

           $lista_veterinarios[] = $vet;

        }

        return $lista_veterinarios;

    }

    function pintarVeterinarios($lista_veterinarios)
    {

        foreach($lista_veterinarios as $veterinario)
        {
            echo
            ('
            
            <div class="col-md-4">
                <div class="fh5co-blog animate-box">
                    <div class="blog-text">
                        <h3><a href="#">'.$veterinario->getNombre().'</a></h3>
                        <p>'.$veterinario->getDireccion().'</p>
                    </div>
                </div>
            </div>

            ');
        }

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