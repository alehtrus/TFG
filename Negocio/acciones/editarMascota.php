<?php

require_once('../../AccesoDatos/AD_Mascota.php');
require_once('../../Util/Util.php');


$id = $_POST['idMascota'];
$nombre = $_POST['nombre'];
$especie = $_POST['especie'];
$raza = $_POST['raza'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$idPropietario = $_POST['propietario'];
$fecha = $_POST['fecha'];

$fecha = formatearFecha($fecha);


$mascota = new MascotasAccesoDatos();
$rs = $mascota->editarMascota($id,$nombre,$especie,$raza,$edad,$genero,$idPropietario,$fecha);

if($rs != true){
    header('Location: error.html');
}

//header('Location: ../Vistas/torneosVista.php');
/*
$mascota = new Mascota();
$mascota->editarMascota($id,$nombre,$especie,$raza,$edad,$genero,$idPropietario,$fecha);


//$rq = "http://localhost:5174/api/Mascota/editar?id=".$id."&nombre=".$nombre."&especie=".$especie."&raza=".$raza."&edad=".$edad."&genero=".$genero."&idPropietario=".$idPropietario."&fechaUltimavisita=".$fecha."";
$rq = "http://localhost:5174/api/Mascota/id=69";

// Inicializar el objeto curl
$ch = curl_init();

// Establecer las opciones de curl
curl_setopt($ch, CURLOPT_URL, $rq);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


// Ejecutar la solicitud y obtener la respuesta
$response = curl_exec($ch);

if (curl_errno($ch)) {
    $error_message = curl_error($ch);
    print($error_message);
} else {
    print($response);
    curl_close($ch);
    echo('hola?');
}

*/

