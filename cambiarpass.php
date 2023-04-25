<?php
include('php/funciones.php');
VerificarDatos();
include("php/conexion.php");
VerificarSesion();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='css/cabecera.css'>
        <link rel='stylesheet' type='text/css' media='screen' href='css/registros.css'>
    <link rel="shortcut icon" href="img/logo_mdh.png">
    <title>Cambiar Contraseña</title>
</head>
<body>
    <?php
    include('cabecera.php');
    ?>

    <div class="contenedor contenedor-res">
<form action="php/p_cambiarpass.php" method="post">
<div class="contenedor-filtros">
            Ingresar Nueva Contraseña:
            <input type="password" name="txt_pass" id="txt_pass" class="caja caja-mediana">
        </div>
        <br>
        <div class="contenedor-filtros">
            Repetir Nueva Contraseña:
            <input type="password" id="txt_repass" name="txt_repass" class="caja caja-mediana" >
        </div>
        <br>
        <div class="Boton" id="contenedor-submit"><input id="btn_enviar" type="submit" value="Guardar"></div>
    
</form>
        
    </div> 

</body>
</html>