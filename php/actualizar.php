<?php

include("conexion.php");
include("p_login.php");

$_CodUsu = $_SESSION["usuario"];

$sql = "select * from usuario u where u.CodigoUsu='$_CodUsu'";
$fila = mysql_query($sql, $cn);
$r = mysql_fetch_array($fila);

if($r['DireccionUsu'] == null || $r['CelularUsu'] == null || $r['EmailUsu'] == null || $r['SexoUsu'] == null || $r['FechaNacUsu'] == null ){
    header('location: ../index.html');
}else{
    header('location: ../principal.html');
}

?>