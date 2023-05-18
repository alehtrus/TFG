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