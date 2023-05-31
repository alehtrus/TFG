<?php 
require_once('conexion.php');
class CitaAccesoDatos
{
    function __construct()
    {
        
    }

    function insertarCita($fecha, $idProcedimiento, $idMascota, $idMedico, $motivo)
    {
        $conexion = getConexion();

        $consulta = mysqli_prepare( $conexion, 'INSERT into CITAS (fecha, procedimiento_id, id_mascota, id_medico, motivo) VALUES (?, ?, ?, ?, ?)');

        $fecha = mysqli_real_escape_string($conexion, $fecha);
        $idProcedimiento = mysqli_real_escape_string($conexion, $idProcedimiento);
        $idMascota = mysqli_real_escape_string($conexion, $idMascota);
        $idMedico = mysqli_real_escape_string($conexion, $idMedico);
        $motivo = mysqli_real_escape_string($conexion, $motivo);
        

        $consulta->bind_param('siiis',$fecha, $idProcedimiento, $idMascota, $idMedico, $motivo);

        $rs = $consulta->execute();        

        return $rs;

    }

    
    function borrarCita($id)
    {

        $conexion = getConexion();

        $consulta = mysqli_prepare( $conexion, 'DELETE from citas where id=?');
        
        $id = mysqli_real_escape_string($conexion, $id);
        $consulta->bind_param('i', $id);
        
        $rs = $consulta->execute();        

        return $rs;

    }

}