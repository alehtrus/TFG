<?php

require_once('../cMascota.php');


$nombre = $_POST['nombre'];
$especie = $_POST['especie'];
$raza = $_POST['raza'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$idPropietario = $_POST['propietario'];
$fecha = $_POST['fecha'];

try {
    $tmpMascota = new Mascota();
    $rs = $tmpMascota->insertarMascota($nombre, $especie, $raza, $edad, $genero, $idPropietario, $fecha);

    if ($rs) {
        header("Location: /tfg/Vistas/owner.php?id=" . $idPropietario);
    } else {
        header('Location: /tfg/Vistas/error/error.html');
    }
} catch (mysqli_sql_exception $e) {
    header('Location: /tfg/Vistas/error/error.html');
} catch (Exception $e) {
    header('Location: /tfg/Vistas/error/error.html');
}
