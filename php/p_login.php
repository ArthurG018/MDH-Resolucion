<?php

session_start();

include("conexion.php");

$usuario = $_POST["txtusuario"];
$contraseña = $_POST["txtpassword"];

$sql = "select u.*, tu.* from usuario u, tipousuario tu where u.CodigoUsu = '$usuario' and u.PasswordUsu = '$contraseña' and u.IdTipoUsu = tu.IdTipoUsu";

$fila = mysql_query($sql, $cn);
$r = mysql_fetch_array($fila);

$codigo = $r["CodigoUsu"];

if ($codigo == null) {

    header('location: ../index.php');

} else {

    $_SESSION["usuario"] = $codigo;
    $_SESSION["tipousuario"] = $r["NombreTipoUsu"];

    header('location: ../principal.php');
}

?>