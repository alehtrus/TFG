<?php

require_once('../cVisita.php');

$id = $_GET['id'];
$idCita = $_GET['idCita'];

var_dump($id);
var_dump($idCita);

$v = new Visita();
$v->borrarCita($idCita);

header('Location: /tfg/Vistas/visitsPet.php?id='.$id);



