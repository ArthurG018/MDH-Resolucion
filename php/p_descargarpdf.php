<?php
include('funciones.php');
VerificarDatos();
include("conexion.php");
VerificarSesion();

$codi = $_GET['num'];
$file_path = '../resoluciones/'.$codi.'.pdf';

// Comprobar si el archivo existe
if (file_exists($file_path)) {
  // Agregar la cabecera Content-Type
  header('Content-Type: application/pdf');
  // Agregar la cabecera Content-Disposition
  header('Content-Disposition: inline; filename="'.basename($file_path).'"');
  // Leer el contenido del archivo y mostrarlo en el navegador
  readfile($file_path);
} else {
  // Si el archivo no existe, mostrar un mensaje de error
  echo 'El archivo no existe.';
}


?>