<?php
include("conexion.php");
include('funciones.php'); 
VerificarSesion();

//Primario
$_codusu = $_POST['txt_codigo'];
$_passw = CreatePassword() ;
$_apater = utf8_decode($_POST['txt_apaterno']);
$_amater = utf8_decode($_POST['txt_amaterno']);
$_nombre = utf8_decode($_POST['txt_nombre']);
$_dni = $_POST['txt_dni'];


$sql = "insert into usuario (CodigoUsu,PasswordUsu,PaternoUsu,MaternoUsu,NombreUsu,DNIUsu,IdTipoUsu)
            values('$_codusu','$_passw','$_apater','$_amater','$_nombre','$_dni',2)";
    mysql_query($sql,$cn);
    mysql_close($cn);
    header('location: ../registrarusuario.php');

?>