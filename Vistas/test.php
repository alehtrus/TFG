<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento de test</title>
</head>

<body>

    <?php

    require_once("../Negocio/cUsuario.php");
    require_once("../Negocio/cPropietario.php");

    $a = new Usuario();
    //$a->insertarUsuario("45389640C", "12345678", "vet");
    //$a->insertarUsuario("60389640C", "12345678", "usr");
    $a->verificar("18516119S","contraseña");

    /* INESERCCION DE USUARIOS EN LA BASE DE DATOS
    $a->insertarUsuario('Z5728886M', 'contraseña', 'VET');
    $a->insertarUsuario('36701642J', 'contraseña', 'VET');
    $a->insertarUsuario('48568720B', 'contraseña', 'VET');
    $a->insertarUsuario('18516119S', 'contraseña', 'VET');
    $a->insertarUsuario('47249526M', 'contraseña', 'VET');
    $a->insertarUsuario('86138623N', 'contraseña', 'USR');
    $a->insertarUsuario('58840661Z', 'contraseña', 'USR');
    $a->insertarUsuario('66377255Z', 'contraseña', 'USR');
    $a->insertarUsuario('98006682W', 'contraseña', 'USR');
    $a->insertarUsuario('10087273W', 'contraseña', 'USR');
    $a->insertarUsuario('84604555K', 'contraseña', 'ADMIN');
    */


    /*
    $p = new Propietario();
    $tmpProp = new Propietario();
    $rq = "http://localhost:5174/api/Propietario?dni=10087273W";
    $rq = file_get_contents($rq);
    $rs = $tmpProp->unserializePropietarios($rq);

    var_dump($rs[0]->getID());
    */






    ?>

</body>

</html>