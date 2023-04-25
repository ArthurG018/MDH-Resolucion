<?php
include("conexion.php");
include('funciones.php');
VerificarSesion();

$_num = $_GET['num'];

$sql = "select * from resolucion
        where NumeroRes = '$_num'";

$fila=mysql_query($sql,$cn);

$r=mysql_fetch_array($fila);

if($r['IdEstado']==1){

    $sql1="update resolucion
    set IdEstado = 2
    where NumeroRes = '$_num'";
    mysql_query($sql1,$cn);

}elseif($r['IdEstado']==2){

    $sql1="update resolucion
    set IdEstado = 1
    where NumeroRes = '$_num'";
    mysql_query($sql1,$cn);
}
mysql_close($cn);

header('location: ../reporte.php');
?>