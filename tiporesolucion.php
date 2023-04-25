<?php

include("php/funciones.php");
VerificarDatos();

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
    <title>Tipo de Resolución</title>
</head>
<body>
    <?php 
    include("cabecera.php");
    ?>
    <div class="contenedor contenedor-tipor">
        <form action="php/p_tiporesolucion.php" method="post">
            <table>
                <tr>
                    <td>Nombre Tipo de Resolución</td>
                </tr>
                <tr>
                    <td><input type="text" name="txt_tipoResolucion" id=""></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Agregar"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>