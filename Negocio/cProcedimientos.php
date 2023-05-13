<?php

class Procedimiento {

    private string $nombre;
    private string $descripcion;

    
    function __construct()
    {
        
    }

    function init($nombre, $descripcion)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;

    }


    function unserializeProcedimientos($fichero)
    {
        $fichero = json_decode($fichero);
        $lista_procedimientos = [];

        foreach($fichero as $procedimiento){
           $procd = new Procedimiento();
           $procd->init($procedimiento->nombre,$procedimiento->descripcion);

           $lista_procedimientos[] = $procd;

        }

        return $lista_procedimientos;

    }

    function pintarProcedimientos($lista_procedmientos)
    {

        foreach($lista_procedmientos as $procedimiento)
        {
            echo
            ('
            
            <div class="col-md-4">
                <div class="fh5co-blog animate-box">
                    <div class="blog-text">
                        <h3><a href="#">'.$procedimiento->getNombre().'</a></h3>
                        <p>'.$procedimiento->getDescripcion().'</p>
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

    function getDescripcion()
    {
        return $this->descripcion;
    }

    function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    
}