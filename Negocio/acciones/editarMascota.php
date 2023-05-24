<?php

require_once('../cMascota.php');
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

var_dump($fecha);

$mascota = new Mascota();
$mascota->editarMascota($id,$nombre,$especie,$raza,$edad,$genero,$idPropietario,$fecha);


