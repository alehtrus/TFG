<?php

require_once('../cMascota.php');


$nombre = $_POST['nombre'];
$especie = $_POST['especie'];
$raza = $_POST['raza'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$idPropietario = $_POST['propietario'];
$fecha = $_POST['fecha'];

//echo($nombre ." ". $especie." ". $raza." ". $edad." ". $genero." ". $idPropietario." ". $fecha);

$tmpMascota = new Mascota();
$tmpMascota->insertarMascota($nombre, $especie, $raza, $edad, $genero, $idPropietario, $fecha);

header("Location: /tfg/Vistas/owner.php?id=".$idPropietario);
