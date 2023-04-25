<?php
include('php/funciones.php');
VerificarDatos();
include("php/conexion.php");
VerificarSesion();

$_CodUsuario = $_SESSION["usuario"];
$file_path = 'imgperfil/'.$_CodUsuario.'.png';

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
    <title>Document</title>
</head>
<body>
    <?php
    include('cabecera.php');
    ?>
    <div class="contenedor contenedor-res">
        <br>
        <div class="contenedor-boton">
            <?php
                if (file_exists($file_path)) {
                    ?>
                    <img class="perfil-editar" src="<?php echo $file_path; ?>"> 
                    <?php
                } else {
                    ?>
                    <img class="perfil-editar" src="imgperfil/default.png">
                    <?php
                }
            ?>
        </div>
        <br>
        <br>
    <div class="Grid">
        <form action="php/p_imagen.php" method="post" enctype="multipart/form-data">
                <div class="Contenedor1">
                    <div class="Premisa1">Escoger Imgen(png,jpg): </div>
                    <div class="Campo1"><input type="file" name="archivo" id="txt_pass" class="caja caja-mediana"></div>
                </div>
                
                <div class="Boton" id="contenedor-submit"><input id="btn_enviar" type="submit" value="Cargar Imagen"> </div>
            

        </form>
        </div>
    </div>
</body>
</html>