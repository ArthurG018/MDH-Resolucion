<?php
include("conexion.php");

//Primario
$_codusu = $_POST['txt_codusu'];
$_passw = $_POST['txt_pasword'];
$_apater = utf8_decode($_POST['txt_paterno']);
$_amater = utf8_decode($_POST['txt_amaterno']);
$_nombre = utf8_decode($_POST['txt_nombre']);
$_dni = $_POST['txt_dni'];

//Segundario
$_direusu = utf8_decode($_POST['txt_direccion']);
$_celusu = $_POST['txt_cel'];
$_emailusu = $_POST['txt_email'];
$_sexousu = $_POST['txt_sexo'];
$_fechnac = $_POST['txt_fechnac'];

if($_direusu == null || $_celusu == null || $_emailusu == null || $_sexousu == null || $_fechnac == null ){
    $sql = "insert into usuario (CodigoUsu,PasswordUsu,PaternoUsu,MaternoUsu,NombreUsu,DNIUsu)
            values('$_codusu','$_passw','$_apater','$_amater','$_nombre','$_dni')";
    mysql_query($sql,$cn);
    mysql_close($cn);
    header('location: xxx');
}else{

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
?>