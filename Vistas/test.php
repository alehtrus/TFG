<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    require_once("../Negocio/cVeterinarios.php");

    $url = "http://localhost:5174/api/Veterinario";

    $contenido = file_get_contents($url);
    $veterinario = new Veterinario();
    $listaVets = $veterinario->unserializeVeterinarios($contenido);
    $veterinario->pintarVeterinarios($listaVets);

    ?>

</body>

</html>