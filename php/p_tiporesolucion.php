<?php
include("conexion.php");

$_nombre = utf8_decode($_POST['txt_tipoResolucion']);
$sql="select * from tiporesolucion";

//Evaluamos si ya existe el nombre tipo de resolucion
$fila=mysql_query($sql,$cn);
while($r=mysql_fetch_array($fila))
{

    if($r['NombreTipoRes']==$_nombre){

        header("location: ../tiporesolucion.php");
        break;
    }

}

    $sql = "insert into tiporesolucion(NombreTipoRes) values('$_nombre')";
    mysql_query($sql, $cn);
    mysql_close($cn);
    header('location: ../tiporesolucion.php');
?>