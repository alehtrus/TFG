<?php

require_once("../cVisita.php");

$tmpVisita = new Visita();

$fecha = $_POST['fecha'];
$idProcedimiento = $_POST['procedimiento'];
$idMascota = $_POST['idMascota'];
$idMedico = $_POST['medico'];
$motivo = $_POST['motivo'];

var_dump($idProcedimiento);

$tmpVisita->insertarVisita($fecha, $idProcedimiento, $idMascota, $idMedico, $motivo);

header("Location: /tfg/Vistas/visitsPet.php?id=". $idMascota."&a=v");



