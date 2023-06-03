<?php

require_once('../cVisita.php');

$id = $_GET['id'];
$idCita = $_GET['idCita'];

var_dump($id);
var_dump($idCita);

try {
    $v = new Visita();
    $rs = $v->borrarCita($idCita);

    if ($rs) {
        header('Location: /tfg/Vistas/visitsPet.php?id=' . $id . "&a=v");
    } else {
        header('Location: /tfg/Vistas/error/error.html');
    }
} catch (mysqli_sql_exception $e) {
    header('Location: /tfg/Vistas/error/error.html');
}catch(Exception $e){
    header('Location: /tfg/Vistas/error/error.html');
}
