<?php

require_once('../cVisita.php');

$id = $_GET['id'];
$idCita = $_GET['idCita'];

var_dump($id);
var_dump($idCita);

$v = new Visita();
$rs= $v->borrarCita($idCita);

if($rs){
    header('Location: /tfg/Vistas/visitsPet.php?id='.$id);
}else{
    header('Location: error.html');
}





