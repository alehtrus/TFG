<?php 
require_once('conexion.php');
class MascotasAccesoDatos
{
    function __construct()
    {
        
    }

    function editarMascota($id, $nombre, $especie, $raza, $edad, $genero, $idPropietario, $fecha)
    {
        $conexion = getConexion();

        $consulta = mysqli_prepare( $conexion, 'UPDATE mascotas set nombre=?, especie=?, raza=?, edad=?, genero=?, id_propietario=?, fecha_ultima_visita=? where id=?');

        $id = mysqli_real_escape_string($conexion, $id);
        $nombre = mysqli_real_escape_string($conexion, $nombre);
        $especie = mysqli_real_escape_string($conexion, $especie);
        $raza = mysqli_real_escape_string($conexion, $raza);
        $edad = mysqli_real_escape_string($conexion, $edad);
        $genero = mysqli_real_escape_string($conexion, $genero);
        $idPropietario = mysqli_real_escape_string($conexion, $idPropietario);
        $fecha = mysqli_real_escape_string($conexion, $fecha);

        $consulta->bind_param('sssisisi',$nombre, $especie, $raza, $edad, $genero, $idPropietario, $fecha, $id);

        $rs = $consulta->execute();        

        return $rs;

    }


    function borrarMascota($id)
    {

        $conexion = getConexion();

        $consulta = mysqli_prepare( $conexion, 'DELETE from mascotas where id=?');
        
        $id = mysqli_real_escape_string($conexion, $id);
        $consulta->bind_param('i', $id);
        
        $rs = $consulta->execute();        

        return $rs;

    }

}