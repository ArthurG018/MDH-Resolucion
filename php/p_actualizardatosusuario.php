<?php
include("conexion.php");
include('funciones.php'); 
VerificarSesion();

$_CodUsuario= $_SESSION["usuario"];

$_direcion = $_POST['txt_direccion'];
$_cel = $_POST['txt_celular'];
$_correo = $_POST['txt_email'];
$_sexo = $_POST['opc_sexo'];
$_FNac = $_POST['txt_FechaNac'];

$sql = "update usuario 
set DireccionUsu = '$_direcion',
    CelularUsu = '$_cel',
    EmailUsu = '$_correo',
    SexoUsu = '$_sexo',
    FechaNacUsu='$_FNac'
    
where 
    CodigoUsu = '$_CodUsuario'";
    mysql_query($sql,$cn);
    mysql_close($cn);
header('location: ../principal.php');
?>