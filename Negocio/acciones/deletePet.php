<?php

require_once('../cMascota.php');

$id = $_GET['id'];

$mascota = new Mascota();
$rs = $mascota->borrarMascota($id);

if($rs){
    header('Location: /tfg/Vistas/med.php');
}else{
    header('Location: error.html');
}




