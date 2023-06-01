<?php

class Procedimiento
{

    private int $idProcedimiento;
    private string $nombre;
    private string $descripcion;


    function __construct()
    {
    }

    function init($idProcedimiento, $nombre, $descripcion)
    {
        $this->idProcedimiento = $idProcedimiento;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }


    function unserializeProcedimientos()
    {
        $url = GET_PROCEDIMIENTOS;

        if (file_get_contents($url) != false) {
            $fichero = file_get_contents($url);

            $fichero = json_decode($fichero);
            $lista_procedimientos = [];

            foreach ($fichero as $procedimiento) {
                $procd = new Procedimiento();
                $procd->init($procedimiento->id, $procedimiento->nombre, $procedimiento->descripcion);

                $lista_procedimientos[] = $procd;
            }

            return $lista_procedimientos;
        }else{
            return null;
        }
    }

    function pintarProcedimientos($lista_procedimientos)
    {    
        if(!empty($lista_procedimientos)){
            foreach ($lista_procedimientos as $procedimiento) {
                echo ('
                
                <div class="col-md-4">
                    <div class="fh5co-blog animate-box">
                        <div class="blog-text">
                            <h3><a href="#">' . $procedimiento->getNombre() . '</a></h3>
                            <p>' . $procedimiento->getDescripcion() . '</p>
                        </div>
                    </div>
                </div>
    
                ');
            }
        }else{
            echo 'ERROR: No se pudo pintar los servicios debido a un error a la conexion con el endpoint.';
        }

        
    }


    function getIdProcedimiento()
    {
        return $this->idProcedimiento;
    }

    function setIdProcedimiento($idProcedimiento)
    {
        $this->idProcedimiento = $idProcedimiento;
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
