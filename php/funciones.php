<?php


session_start();
//para verificar si existe una sesion
function VerificarSesion(){
    if (!isset($_SESSION["usuario"])) {
        #Se ejecuta si hay sesión
        header('location: index.php');
    }
}


//Funcion para crear contraseña
function CreatePassword(){
    $_plantilla="1234567890qwertyuiopasdfghjklzxcvbnm";
        $_pass="";
        for ($i=1; $i <=8 ; $i++) { 
            
            $_pass=$_pass.substr($_plantilla,rand(1,strlen($_plantilla)),1);
        }
        return $_pass;
}

//verificar Index
function VerificarIndex(){
    if (isset($_SESSION["usuario"])) {
    
        #Se ejecuta si hay sesión
        header('location: principal.php');
    
    }
}

//Verificar campos vacíos
function VerificarDatos()
{
    if (isset($_SESSION["usuario"])) {
        include("conexion.php");
        $_Usuario = $_SESSION["usuario"];

        $sql = "select * from usuario where CodigoUsu = '$_Usuario'";
        $datos = mysql_query($sql, $cn);
        $row = mysql_fetch_array($datos);

        if($row["DireccionUsu"] == null || $row["CelularUsu"] == null || $row["EmailUsu"] == null || $row["SexoUsu"] == null || $row["FechaNacUsu"] == null ){
            header('location: actualizardatosusuario.php');
        }

        mysql_close($cn);
    }
}


?>