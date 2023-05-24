<?php

$puerto = "5174";

//CONSTANTES ENDPOINTS
define("GET_PROCEDIMIENTOS","http://localhost:".$puerto."/api/Procedimientos");
define("GET_VETERINARIOS","http://localhost:".$puerto."/api/Veterinario");
define("GET_MASCOTAS_POR_PROPIETARIO","http://localhost:".$puerto."/api/Mascota/propietario?id=");
define("GET_TODAS_MASCOTAS","http://localhost:".$puerto."/api/Mascota/medico");
define("GET_MASCOTA","http://localhost:".$puerto."/api/Mascota/mascota?id=");
define("GET_VISITAS_MASCOTA","http://localhost:".$puerto."/api/Citas/citasMascota?idMascota=");
define("GET_VISITAS_TODAS","http://localhost:".$puerto."/api/Citas/todasCitas");

function customErrorHandle($errno, $errstr, $errfile, $errline)
{
    // Verificar si el error es un warning
    if ($errno === E_WARNING) {        
        //error_log("ERROR: $errstr in $errfile on line $errline", 0);
        error_log("ERROR: No se ha podido acceder al endpoint.", 0);
    }
}

function formatearFecha($fecha)
{
    //var_dump($fecha);
    $partes = explode(" ", $fecha);
    //var_dump($partes);
    $partesFecha = explode("/", $partes[0]);

    $fechaFinal = $partesFecha[2]."/".$partesFecha[1]."/".$partesFecha[0]. " " . $partes[1];

    return $fechaFinal;
}