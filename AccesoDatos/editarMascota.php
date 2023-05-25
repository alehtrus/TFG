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
        $consulta->bind_param('sssisisi',$nombre, $especie, $raza, $edad, $genero, $idPropietario, $fecha, $id);

        $consulta->execute();        

    }

}