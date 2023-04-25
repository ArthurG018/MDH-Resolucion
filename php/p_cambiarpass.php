<?php
include("conexion.php");
include('funciones.php');
VerificarSesion();

$codigo=$_SESSION['usuario'];
$_contr=$_POST['txt_pass'];
$_recon=$_POST['txt_repass'];

//evaluar si son iguales
if(strcmp($_contr,$_recon) == 0){
    //puede cambiar la conytraseña
    if(strlen($_contr)==8 && strlen($_recon)==8){
       
        $sql="update usuario
            set PasswordUsu = '$_contr'
                where CodigoUsu = '$codigo'";
        mysql_query($sql,$cn);
        mysql_close($cn);
        header('location:p_cerrarsesion.php');

    }else{
        header('location:../cambiarpass.php');
    }

}else{
    header('location:../cambiarpass.php');
}

?>