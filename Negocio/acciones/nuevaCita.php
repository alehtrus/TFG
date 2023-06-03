<?php

require_once("../cVisita.php");

$tmpVisita = new Visita();

$fecha = $_POST['fecha'];
$idProcedimiento = $_POST['procedimiento'];
$idMascota = $_POST['idMascota'];
$idMedico = $_POST['medico'];
$motivo = $_POST['motivo'];

try {
    $rs = $tmpVisita->insertarVisita($fecha, $idProcedimiento, $idMascota, $idMedico, $motivo);

    if ($rs) {
        header("Location: /tfg/Vistas/visitsPet.php?id=" . $idMascota . "&a=v");
    } else {
        header('Location: /tfg/Vistas/error/error.html');
    }
} catch (mysqli_sql_exception $e) {
    header('Location: /tfg/Vistas/error/error.html');
} catch (Exception $e) {
    header('Location: /tfg/Vistas/error/error.html');
}
