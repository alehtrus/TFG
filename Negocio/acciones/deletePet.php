<?php

require_once('../cMascota.php');

$id = $_GET['id'];

try {
    $mascota = new Mascota();
    $rs = $mascota->borrarMascota($id);

    if ($rs) {
        header('Location: /tfg/Vistas/med.php');
    } else {
        header('Location: /tfg/Vistas/error/error.html');
    }
} catch (mysqli_sql_exception $e) {
    header('Location: /tfg/Vistas/error/error.html');
}catch(Exception $e){
    header('Location: /tfg/Vistas/error/error.html');
}
