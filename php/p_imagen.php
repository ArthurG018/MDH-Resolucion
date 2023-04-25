<?php
include('funciones.php');
VerificarSesion();

$_codigo=$_SESSION['usuario'];

$_archivo=$_FILES['archivo']['tmp_name'];
$_nombrearchivo=$_FILES['archivo']['name'];
List($n,$e)=explode(".",$_nombrearchivo);

if($e == "png" || $e == "jpg"){

    move_uploaded_file($_archivo,"../imgperfil/".$_codigo.".png");
    header('location:../principal.php');

}else{
    header('location:../imagen.php');
}
?>