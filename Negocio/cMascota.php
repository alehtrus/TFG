<?php

class Mascota {

    private string $nombre;
    private string $especie;
    private string $raza;
    private string $edad;
    private string $genero;
    private string $id_propietario;
    private string $fecha_ultima_visita;

    
    function __construct()
    {
        
    }

    function init($nombre, $especie, $raza, $edad, $genero, $id_propietario, $fecha_ultima_visita)
    {
        $this->nombre = $nombre;
        $this->especie = $especie;
        $this->raza = $raza;
        $this->edad = $edad;
        $this->genero = $genero;
        $this->id_propietario = $id_propietario;
        $this->fecha_ultima_visita = $fecha_ultima_visita;

    }


    function unserializeMascotas($fichero)
    {
        $fichero = json_decode($fichero);
        $lista_mascotas = [];

        foreach($fichero as $mascota){
           $masct  = new Mascota();
           $masct ->init($mascota->nombre, $mascota->especie, $mascota->raza, $mascota->edad, $mascota->genero, $mascota->id_propietario, $mascota->fecha_ultima_visita);

           $lista_mascotas[] = $mascota ;

        }

        return $lista_mascotas;

    }

    function pintarMascotas($lista_mascotas)
    {
        echo ('<div class="row">');
        foreach($lista_mascotas as $mascota)
        {
            echo
            ('            
            <div class="col-md-4">            
                <div class="fh5co-blog animate-box">
                    <div class="blog-text">
                        <h3><a href="#">'.$mascota->nombre.'</a></h3>
                    </div>
                </div>
            </div>

            ');
        }
        echo ('</div>');

    }


    function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


}