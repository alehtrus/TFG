<?php

class VisitaExtended
{

    private int $idCitas;
    private string $fecha;
    private string $nombreMascota;
    private string $nombreMedico;
    private string $motivo;
    private int $idProcedimiento;
    private string $nombreProcedimiento;
    private string $descripcion;
    
    
    function __construct()
    {
        
    }

    function init($idCitas, $fecha, $nombreMascota, $nombreMedico, $motivo, $idProcedimiento, $nombreProcedimiento, $descripcion)
    {
        $this->idCitas = $idCitas;
        $this->fecha = $fecha;
        $this->nombreMascota = $nombreMascota;
        $this->nombreMedico = $nombreMedico;
        $this->motivo = $motivo;
        $this->idProcedimiento = $idProcedimiento;
        $this->nombreProcedimiento = $nombreProcedimiento;
        $this->descripcion = $descripcion;
    }

    function unserializeVisitas($fichero)
    {
        $fichero = json_decode($fichero);
        $lista_visitas = [];

        foreach($fichero as $visitas){
           $vst  = new VisitaExtended();
           $vst->init($visitas->idCitas, $visitas->fecha, $visitas->nombreMascota, $visitas->nombreMedico, $visitas->motivo, $visitas->idProcedimiento, $visitas->nombreProcedimiento, $visitas->descripcion);

           $lista_visitas[] = $visitas;

        }

        return $lista_visitas;

    }

    function pintarVisitas($lista_visitas)
    {        
        echo ('<div class="row">');
        foreach($lista_visitas as $visita)
        {
            echo
            ('            
            <div class="col-md-12">            
                <div class="fh5co-blog animate-box">
                    <div class="blog-text">
                    <table class="visita">
                    <tr>
                        <td class="fecha">'.$visita->fecha.'</td>
                        <td class="nombreMascota">'.$visita->nombreMascota.'</td>
                        <td class"nombreMedico">'.$visita->nombreMedico.'</td>
                        <td class="motivo">'.$visita->motivo.'</td>
                        <td class="procedimiento">'.$visita->nombreProcedimiento.'</td>
                    </tr>
                </table>
                    </div>
                </div>
            </div>

            ');
        }
        echo ('</div>');

    }

    function getId()
    {
        return $this->idCitas;
    }

    function setId($id)
    {
        $this->idCitas = $id;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function getNombreMascota()
    {
        return $this->nombreMascota;
    }

    function setNombreMascota($nombreMascota)
    {
        $this->nombreMascota = $nombreMascota;
    }

    function getNombreMedico()
    {
        return $this->nombreMedico;
    }

    function setNombreMedico($nombreMedico)
    {
        $this->nombreMedico = $nombreMedico;
    }

    function getMotivo()
    {
        return $this->motivo;
    }

    function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    }

    function getProcedimientoID()
    {
        return $this->idProcedimiento;
    }

    function setProcedimientoID($idProcedimiento)
    {
        $this->idProcedimiento = $idProcedimiento;
    }

    function getNombreProcedimiento()
    {
        return $this->nombreProcedimiento;
    }

    function setNombreProcedimiento($nombreProcedimiento)
    {
        $this->nombreProcedimiento = $nombreProcedimiento;
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
