<?php

class Visita
{

    private int $idCitas;
    private string $fecha;
    private int $id_mascota;
    private string $nombreMedico;
    private string $motivo;
    private int $procedimiento_id;
    private string $nombreProcedimiento;
    private string $descripcion;

    function __construct()
    {
    }

    function init($idCitas, $fecha, $id_mascota, $nombreMedico, $motivo, $procedimiento_id, $nombreProcedimiento, $descripcion)
    {
        $this->idCitas = $idCitas;
        $this->fecha = $fecha;
        $this->id_mascota = $id_mascota;
        $this->nombreMedico = $nombreMedico;
        $this->motivo = $motivo;
        $this->procedimiento_id = $procedimiento_id;
        $this->nombreProcedimiento = $nombreProcedimiento;
        $this->descripcion = $descripcion;
    }

    function unserializeVisitas($fichero)
    {
        $fichero = json_decode($fichero);
        $lista_visitas = [];

        foreach ($fichero as $visitas) {
            $vst  = new Visita();
            $vst->init($visitas->idCitas, $visitas->fecha, $visitas->id_mascota, $visitas->nombreMedico, $visitas->motivo, $visitas->procedimiento_id, $visitas->nombreProcedimiento, $visitas->descripcion);

            $lista_visitas[] = $vst;
        }

        return $lista_visitas;
    }

    function pintarVisitasMed($lista_visitas)
    {
        $idMascota = $_GET['id'];
        if (!empty($lista_visitas)) {
            echo ('<div class="row">');
            $numVisitas = count($lista_visitas);
            echo ('<h3>Número de visitas: ' . $numVisitas . '</h3>');
            foreach ($lista_visitas as $visita) {
                echo ('            
            <div class="col-md-12">            
                <div class="fh5co-blog animate-box">
                    <div class="blog-text">
                    <table class="visita">
                    <tr>
                        <td class="fecha">' . $visita->getFecha() . '</td>
                        <td class"nombreMedico">' . $visita->getNombreMedico() . '</td>
                        <td class="motivo">' . $visita->getMotivo() . '</td>
                        <td class="procedimiento">' . $visita->getNombreProcedimiento() . '</td>
                        <td class="eliminar"><a href="/tfg/Negocio/acciones/deleteCita.php?id=' . $visita->getIdMascota() . '&idCita=' . $visita->getId() . '">Eliminar</a></td>
                    </tr>
                </table>
                    </div>
                </div>
            </div>           

            ');
            }            

            echo ('

        <div class="col-md-12">
			<div class="fh5co-blog animate-box">
				<div class="blog-text">
					<a href="newVisit.php?id=' . $idMascota . '">
                        <table class="visita">
                            <tr>
                                <td class="nuevaVista"> Nueva visita +</td>
                            </tr>
                        </table>
                    </a>
				</div>
			</div>
            <div><a href="med.php">Atrás</a></div>
		</div>
        
        ');
            echo ('</div>');
        } else {
            echo ('

        <div class="col-md-12">
			<div class="fh5co-blog animate-box">
				<div class="blog-text">
					<a href="newVisit.php?id=' . $idMascota . '">
                        <table class="visita">
                            <tr>
                                <td class="nuevaVista"> Nueva visita +</td>
                            </tr>
                        </table>
                    </a>
				</div>
			</div>
            <div><a href="med.php">Atrás</a></div>
		</div>
        
        ');
        }
    }

    function insertarVisita($fecha, $idProcedimiento, $idMascota, $idMedico, $motivo)
    {
        require_once('../../AccesoDatos/AD_Cita.php');
        $mascota = new CitaAccesoDatos();
        $rs = $mascota->insertarCita($fecha, $idProcedimiento, $idMascota, $idMedico, $motivo);

        return $rs;
    }

    function borrarCita($id)
    {
        require_once('../../AccesoDatos/AD_Cita.php');
        $cita = new CitaAccesoDatos();
        $rs = $cita->borrarCita($id);

        return $rs;
    }

    function pintarVisitas($lista_visitas)
    {

        if (!empty($lista_visitas)) {
            echo ('<div class="row">');
            $numVisitas = count($lista_visitas);
            echo ('<h3>Número de visitas: ' . $numVisitas . '</h3>');
            foreach ($lista_visitas as $visita) {
                echo ('            
            <div class="col-md-12">            
                <div class="fh5co-blog animate-box">
                    <div class="blog-text">
                    <table class="visita">
                    <tr>
                    <td class="fecha">' . $visita->getFecha() . '</td>
                    <td class"nombreMedico">' . $visita->getNombreMedico() . '</td>
                    <td class="motivo">' . $visita->getMotivo() . '</td>
                    <td class="procedimiento">' . $visita->getNombreProcedimiento() . '</td>
                    </tr>
                </table>
                    </div>
                </div>
            </div>

            ');
            }

            echo ('
            <div class="col-md-12">
                <div><a onClick="history.go(-1)">Atrás</a></div> 
            </div>
        ');
            echo ('</div>');
        } else {
            echo 'El peludito no tiene visitas registradas o el listada aparece vacío.';
        }
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

    function getIdMascota()
    {
        return $this->id_mascota;
    }

    function setIdMascota($id_mascota)
    {
        $this->id_mascota = $id_mascota;
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
        return $this->procedimiento_id;
    }

    function setProcedimientoID($procedimiento_id)
    {
        $this->procedimiento_id = $procedimiento_id;
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
