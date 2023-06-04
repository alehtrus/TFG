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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
								<?php
								session_start(); // reanudamos la sesión
								if (isset($_SESSION['usuario'])) {
									if ($_SESSION['rol'] == 'VET') {
										echo ('<li><a href="med.php">Animales</a></li>');
									} else {
										echo ('<li><a href="owner.php?id=' . $_SESSION['id'] . '">Mis mascotas</a></li>');
									}
								} else {
									echo ('<li><a href="login.php">Iniciar sesión</a></li>');
								}
								?>

							</ul>
						</div>
					</div>

				</div>
			</div>
		</nav>
		<div class="container-wrap">
			<aside id="fh5co-hero">
				<!-- CARRUSEL -->
				<div class="flexslider">
					<ul class="slides">
						<li style="background-image: url(images/vet1.jpg);">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 col-md-offset-3 col-md-push-3 slider-text">
										<div class="slider-text-inner">
											<h1>Ellos también merecen un sistema centralizado</h1>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li style="background-image: url(images/vet2.jpg);">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 col-md-offset-3 col-md-pull-3 slider-text">
										<div class="slider-text-inner">
											<h1>Por el cariño que nos proporcionan</h1>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li style="background-image: url(images/vet3.jpg);">
							<div class="container-fluids">
								<div class="row">
									<div class="col-md-6 col-md-offset-3 slider-text">
										<div class="slider-text-inner text-center">
											<h1>Siempre a nuestro lado, igual que nosotros al suyo</h1>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li style="background-image: url(images/vet4.jpg);">
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 col-md-offset-3 col-md-push-3 slider-text">
										<div class="slider-text-inner">
											<h1>Por el mejor cuidado posible</h1>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</aside>

			<div id="fh5co-services">
				<div class="row">
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="bi bi-clipboard2-pulse"></i>
							</span>
							<div class="desc">
								<h3><a href="#">Servicios</a></h3>
								<p>Encuntra un listado de todos los servicios que tenemos registrados en nuestro sistema que ofrecen los veterinarios asociados con nosotros.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="bi bi-heart-pulse"></i>

							</span>
							<div class="desc">
								<h3><a href="#">Veterinarios</a></h3>
								<p>Aquí podrás ver todos los veterinarios que trabajan con nosotros e información registrada sobre ellos.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="services">
							<span class="icon">
								<i class="bi bi-patch-question"></i>
							</span>
							<div class="desc">
								<h3><a href="#">¿Qué somos?</a></h3>
								<p>Si estas interesado en saber qué somo, de donde sale esta plataforma y no puedes aguantarte la curiosidad...</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="fh5co-blog" class="blog-flex">
				<div class="featured-blog">
					<div class="desc-t">
						<div class="desc-tc">
							<span class="featured-head">Posts destacados</span>
							<h3><a href="#">Información y articulos sobre los pequeños peludos</a></h3>

						</div>
					</div>
				</div>
				<div class="blog-entry fh5co-light-grey">
					<div class="row animate-box">
						<div class="col-md-12">
							<h2>Últimos posts</h2>
						</div>
					</div>
					<div class="row">
						<!-- Noticias aquí -->
						<?php
						require_once("../Negocio/cNoticia.php");
						require("../Util/Util.php");
						set_error_handler('customErrorHandle');

						$new = new Noticia();
						$listaNews = $new->unserializeNoticias();
						$new->pintarNoticias($listaNews);
						?>
					</div>
					<!-- Terminan las noticias -->
				</div>
			</div>
			<!-- Animales en adopcion -->
			<div id="fh5co-blog" class="blog-flex">
				<div class="blog-entry fh5co-light-grey">
					<div class="row animate-box">
						<div class="col-md-12">
							<h2>Peluditos sin hogar</h2>
						</div>
					</div>
					<div class="row">
						<!-- Animiales aquí -->
						<div id="carouselExample" class="carousel slide">
							<div class="carousel-inner">
								
								<?php								
								require_once("../Negocio/cAnimalAdopcion.php");
								$aniaml = new AnimalAdoptivo();
								$tmpLista = $aniaml->unserializeAnimal();
								$aniaml->pintarAnimales($tmpLista);
								
								?>
							</div>							
							<button class="carousel-control-next boton-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black;"></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>

					</div>
					<!-- Terminan las animales -->
				</div>
				<div class="featured-blog">
					<div class="desc-t">
						<div class="desc-tc">

							<h3><a href="#">Animales en adopcion</a></h3>

						</div>
					</div>
				</div>
			</div>
		</div><!-- END container-wrap -->

		<div class="container-wrap">
			<footer id="fh5co-footer" role="contentinfo">
				<div class="row">

					<div class="col-md-3 col-md-push-1">
						<h4>Últimos posts</h4>
						<ul class="fh5co-footer-links">
							<?php
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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