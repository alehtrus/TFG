<?php
ini_set('display_errors', 'On');
ini_set('html_errors', 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos del formulario
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $mensaje = $_POST['mensaje'];
  

  // Configurar el correo electrónico
  $destinatario = 'acanofiteni@iessonferrer.net'; 
  $asunto = 'Nuevo mensaje del formulario de contacto de'. $nombre;
  $cuerpo = "Mensaje: $mensaje\n";
  $cabeceras = "From: $email";
  $cabeceras .= 'MIME-Version: 1.0' . ""; 
  $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "";
  // Enviar el correo electrónico
  $resultado = mail($destinatario, $asunto, $cuerpo, $cabeceras);

  if ($resultado) {
    header('Location: index.php');
  } 
}
?>
