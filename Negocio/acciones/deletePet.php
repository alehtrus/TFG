<?php

require_once('../cMascota.php');

$id = $_GET['id'];

$mascota = new Mascota();
$rs = $mascota->borrarMascota($id);

header('Location: /tfg/Vistas/med.php');



