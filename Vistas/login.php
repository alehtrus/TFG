<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url(images/fondoLogin.jpg);
            height: 100vh;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 320px;
            border: 2px solid #9C9C9C;
            background-color: rgba(234, 234, 234, 0.9);
            color: #196F3D;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }

        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }

        .titulo {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            color: #196F3D;
            font-size: 40pt;
            text-shadow: 2px 2px 2px black;
        }

        .boton{
            font-weight: 600;
            background-color: #196F3D;
        }
    </style>
</head>

<body>
    <div id="login">
        <?php

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                require_once("../Negocio/cUsuario.php");
                require_once("../Negocio/cPropietario.php");

                $usuario = new Usuario();
                $perfil =  $usuario->verificar($_POST['usuario'], $_POST['clave']);

                if ($perfil['rol'] === "USR") {
                    session_start(); //inicia o reinicia una sesión
                    $_SESSION['usuario'] = $_POST['usuario'];
                    $_SESSION['rol'] = $perfil['rol'];
                    

                    $tmpProp = new Propietario();
                    $rq = "http://localhost:5174/api/Propietario?dni=" . $perfil['dni'];
                    $rq = file_get_contents($rq);
                    $rs = $tmpProp->unserializePropietarios($rq);
                    $_SESSION['id'] = $rs[0]->getID();

                    header("Location: owner.php?id=" . $rs[0]->getID());
                } elseif ($perfil['rol'] === "VET") {
                    session_start(); //inicia o reinicia una sesión
                    $_SESSION['usuario'] = $_POST['usuario'];
                    $_SESSION['rol'] = $perfil['rol'];
                    header("Location: med.php");
                } else {
                    header("Location: login.php");
                }
            }
        } catch (Exception $ex) {
            print('petó');
        }


        ?>
        <h1 class="text-center titulo pt-5">Portal del Peludo</h1>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <h3 class="text-center text-black">Login</h3>
                            <div class="form-group">
                                <label for="usuario" class="text-green">Usuario:</label><br>
                                <input type="text" name="usuario" id="usuario" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="clave" class="text-green">Contraseña:</label><br>
                                <input type="password" name="clave" id="clave" class="form-control">
                            </div>
                            <?php
                            if (isset($error)) {
                                print("<div> No tienes acceso </div>");
                            }
                            ?>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn boton btn-md" value="Iniciar Sesión">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>