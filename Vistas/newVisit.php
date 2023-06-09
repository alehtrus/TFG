<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Portal del Peludo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Plataforma donde alojar y revisar el historial médico de tu mascota" />


    <link href="https://fonts.googleapis.com/css?family=Oxygen:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="css/flexslider.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>


</head>

<body>
    <div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="container-wrap">
                <div class="top-menu">
                    <div class="row">
                        <div class="col-xs-4">
                            <div id="fh5co-logo"><a href="index.php">Portal del Peludo</a></div>
                        </div>
                        <div class="col-xs-8 text-right menu-1">
                            <ul>
                                <li class="active"><a href="index.php">Inicio</a></li>
                                <li><a href="services.php">Servicios</a></li>
                                <li><a href="vets.php">Veterinarios</a></li>
                                <li><a href="about.php">¿Qué somos?</a></li>
                                <li><a href="contact.php">Contacto</a></li>
                                <li><a href="logout.php">Cerrar sesión</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <div class="container-wrap">
            <div id="fh5co-work">
                <?php

                session_start(); // reanudamos la sesión
                if (!isset($_SESSION['usuario'])) {
                    header("Location: login.php");
                }

                require_once('../Negocio/cMascota.php');
                require_once('../Util/Util.php');

                ini_set('display_errors', 'On');
                ini_set('html_errors', 0);

                $idMascota = $_GET['id'];

                ?>
                <h3>Nueva visita</h3>
                <form action="../Negocio/acciones/nuevaCita.php" method="POST">
                    <div class="row">
                        <div class="col-xs-4">
                            <label for="fecha">Fecha de la cita: </label>
                        </div>
                        <div class="col-xs-4">
                            <input type="datetime-local" name="fecha" id="fecha" required>
                            <input type="hidden" name="idMascota" id="idMascota" value="<?php echo ($idMascota); ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <label for="medico">Médico: </label>
                        </div>
                        <div class="col-xs-4">
                            <select name="medico" id="medico" required>
                                <option selected="true" disabled="disables">Selecciona un médico</option>
                                <?php

                                require_once('../Negocio/cMedico.php');
                                $tmpMed = new Medico();
                                $lista_medicos = $tmpMed->unserializeMedicos();

                                foreach ($lista_medicos as $medicos) {
                                    echo ('<option value="' . $medicos->getId() . '">' . $medicos->getNombre() . '</option>');
                                }

                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <label for="motivo">Motivo: </label>
                        </div>
                        <div class="col-xs-4">
                            <textarea name="motivo" id="motivo" cols="60" rows="3" required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <label for="procedimiento">Procedimiento: </label>
                        </div>
                        <div class="col-xs-4">

                            <select name="procedimiento" id="procedimiento" onchange="mostrarValorSeleccionado()" required>
                                <option selected="true" disabled="disables">Selecciona un procedimiento</option>
                                <?php
                                require_once('../Negocio/cProcedimientos.php');
                                $tmpProced = new Procedimiento();
                                $listProced = $tmpProced->unserializeProcedimientos();

                                foreach ($listProced as $proced) {
                                    echo ('<option data-descripcion="' . $proced->getDescripcion() . '" " value="' . $proced->getIdProcedimiento() . '">' . $proced->getNombre() . '');
                                }
                                ?>
                                <script>
                                    function mostrarValorSeleccionado() {
                                        // Obtener el elemento select por su id
                                        var selectElement = document.getElementById("procedimiento");

                                        // Obtener el valor seleccionado

                                        var opcionSeleccionada = selectElement.options[selectElement.selectedIndex];
                                        var descripcion = opcionSeleccionada.getAttribute('data-descripcion');

                                        // Mostrar el valor seleccionado en la consola
                                        var descripcionNode = document.getElementById('descripcion')
                                        descripcionNode.value = descripcion
                                    }
                                </script>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <label for="descripcion">Descripición: </label>
                        </div>
                        <div class="col-xs-4">
                            <textarea name="descripcion" id="descripcion" cols="60" rows="5" disabled required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <input type="submit" value="Guardar">
                        </div>
                    </div>
                </form>


            </div>
        </div>

        <div class="container-wrap">
            <footer id="fh5co-footer" role="contentinfo">
                <div class="row">

                    <div class="col-md-3 col-md-push-1">
                        <h4>Últimos posts</h4>
                        <ul class="fh5co-footer-links">
                            <li><a href="#">Título de los últimos posts con un for (4)</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-md-push-1">
                        <h4>Últimos posts</h4>
                        <ul class="fh5co-footer-links">
                            <?php
                            require_once('../Negocio/cNoticia.php');
                            $new = new Noticia();
                            $listaNews = $new->unserializeNoticias();
                            $new->pintarTitulosNoticias($listaNews);
                            ?>
                        </ul>
                    </div>

                    <div class="col-md-3 col-md-push-1">
                        <h4>Links</h4>
                        <ul class="fh5co-footer-links">
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="services.php">Servicios</a></li>
                            <li><a href="vets.php">Veterinarios</a></li>
                            <li><a href="about.php">¿Qué somos?</a></li>
                        </ul>
                    </div>

                    <div class="row copyright">
                        <div class="col-md-12 text-center">
                            <p>
                                <small class="block">&copy; 2023 Portal del Peludo</small>
                            </p>
                            <p>
                            <ul class="fh5co-social-icons">
                                <li><a href="#"><i class="icon-twitter"></i></a></li>
                                <li><a href="#"><i class="icon-instagram"></i></a></li>
                            </ul>
                            </p>
                        </div>
                    </div>
            </footer>
        </div><!-- END container-wrap -->
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- Flexslider -->
    <script src="js/jquery.flexslider-min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <!-- Counters -->
    <script src="js/jquery.countTo.js"></script>
    <!-- Main -->
    <script src="js/main.js"></script>

</body>

</html>