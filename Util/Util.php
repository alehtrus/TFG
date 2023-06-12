<?php

$puerto = "5174";

//CONSTANTES ENDPOINTS API I
define("GET_PROCEDIMIENTOS","http://localhost:".$puerto."/api/Procedimientos");
define("GET_VETERINARIOS","http://localhost:".$puerto."/api/Veterinario");
define("GET_MASCOTAS_POR_PROPIETARIO","http://localhost:".$puerto."/api/Mascota/propietario?id=");
define("GET_TODAS_MASCOTAS","http://localhost:".$puerto."/api/Mascota/medico");
define("GET_MASCOTA","http://localhost:".$puerto."/api/Mascota/mascota?id=");
define("GET_VISITAS_MASCOTA","http://localhost:".$puerto."/api/Citas/citasMascota?idMascota=");
define("GET_VISITAS_TODAS","http://localhost:".$puerto."/api/Citas/todasCitas");
define("GET_MEDICOS", "http://localhost:".$puerto."/api/Medico");

//CONSTANTES ENDPOINTS API II
$puerto_II = "5134";
define("GET_NOTICIAS","http://localhost:".$puerto_II."/Noticias");
define("GET_ANIMALES","http://localhost:".$puerto_II."/Animales");

function customErrorHandle($errno, $errstr, $errfile, $errline)
{
    // Verificar si el error es un warning
    if ($errno === E_WARNING) {        
        //error_log("ERROR: $errstr in $errfile on line $errline", 0);
        //echo("ERROR: No se ha podido acceder al endpoint.");
    }
}

function recortarString($texto) {
    if (strlen($texto) > 100) {
        $textoRecortado = substr($texto, 0, 100) . "...";
        return $textoRecortado;
    } else {
        return $texto;
    }
}

function cambiarNumAleatorio($lista_noticias, $usados){
    $noticiaAleatoria = random_int(0, count($lista_noticias) -1 );
    
    if(in_array($noticiaAleatoria, $usados)){
        return cambiarNumAleatorio($lista_noticias, $usados);
    }else{
        return $noticiaAleatoria;
    }
    
    $noticiaAleatoria = random_int(0, count($lista_noticias));
}

function formatearFecha($fecha)
{
    //var_dump($fecha);
    $partes = explode(" ", $fecha);
    //var_dump($partes);
    $partesFecha = explode("/", $partes[0]);

    $fechaFinal = $partesFecha[2]."/".$partesFecha[0]."/".$partesFecha[1]. " " . $partes[1];

    return $fechaFinal;
}