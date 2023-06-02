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

				$idMascota = $_GET['id'];

				ini_set('display_errors', 'On');
				ini_set('html_errors', 0);

				$url = GET_MASCOTA . $idMascota;
				$contenido = file_get_contents($url);

				$mascota = new Mascota();				

				$listaMascotas = $mascota->unserializeMascotas($contenido);

				if (isset($_POST['idMascota'])) {
					$id = $_POST['idMascota'];
					$nombre = $_POST['nombre'];
					$especie = $_POST['especie'];
					$raza = $_POST['raza'];
					$edad = $_POST['edad'];
					$genero = $_POST['genero'];
					$idPropietario = $_POST['propietario'];
					$fecha = $_POST['fecha'];
					$fecha = formatearFecha($fecha);

					$rs = $mascota->editarMascota($id, $nombre, $especie, $raza, $edad, $genero, $idPropietario, $fecha);
					var_dump($rs);
					if ($rs == true) {
						header('Location: pet.php?a=v&id=' . $listaMascotas[0]->getID());
					}
				}


				?>

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo ($listaMascotas[0]->getID()); ?>" method="POST">
					<div class="row">
						<div class="col-xs-4">
							<label for="nombre">Nombre: </label>
						</div>
						<div class="col-xs-4">
							<input type="text" name="nombre" id="nombre" value="<?php print($listaMascotas[0]->getNombre()); ?>" required>
							<input type="hidden" name="idMascota" id="idMascota" value="<?php echo ($listaMascotas[0]->getID()); ?>">
							<input type="hidden" name="propietario" id="propietario" value="<?php echo ($listaMascotas[0]->getIdPropietario()); ?>">
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4">
							<label for="especie">Especie: </label>
						</div>
						<div class="col-xs-4">
							<input type="text" name="especie" id="especie" value="<?php echo ($listaMascotas[0]->getEspecie()); ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4">
							<label for="raza">Raza: </label>
						</div>
						<div class="col-xs-4">
							<input type="text" name="raza" id="raza" value="<?php echo ($listaMascotas[0]->getRaza()); ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4">
							<label for="edad">Edad: </label>
						</div>
						<div class="col-xs-4">
							<input type="number" name="edad" id="edad" value="<?php echo ($listaMascotas[0]->getEdad()); ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4">
							<label for="genero">Genero: </label>
						</div>
						<div class="col-xs-4">
							<select name="genero" id="genero" required>
								<option value="" selected="true" disabled="disabled">Selecciona una opción</option>
								<option value="Macho">Macho</option>
								<option value="Hembra">Hembra</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-4">
							<label for="fecha">Fecha de la última visita: </label>
						</div>
						<div class="col-xs-4">
							<input type="datetime" name="fecha" id="fecha" value="<?php echo ($listaMascotas[0]->getFechaUltVisita()); ?>" required>
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
						<h4>Links</h4>
						<ul class="fh5co-footer-links">
							<li><a href="#">Inicio</a></li>
							<li><a href="#">Servicios</a></li>
							<li><a href="#">Veterinarios</a></li>
							<li><a href="#">¿Qué somos?</a></li>
						</ul>
					</div>

					<div class="col-md-4">
						<h4>Información de contacto</h4>
						<ul class="fh5co-footer-links">
							<li>Si estas interesado en fromar parte de la plataforma y estar en el listado de veterinarios, por favor ponte en contacto con nosotros.</li>
							<li><a href="tel://687217632">+34 687 21 76 32</a></li>
							<li><a href="mailto:info@yoursite.com">portaldelpeludo@gmail.com</a></li>
						</ul>
					</div>
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