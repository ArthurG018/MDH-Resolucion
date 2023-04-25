<?php

include('php/funciones.php');
VerificarDatos();
include("php/conexion.php");
VerificarSesion();

$fechainic = date($_POST["fechainicio"]);
$fechafin = date($_POST["fechafin"]);
$sql = "select r.*, tr.*, e.* from resolucion r, tiporesolucion tr, estado e where r.IdTipoRes = tr.IdTipoRes and r.IdEstado = e.IdEstado
    and r.FechaPublicRes between '$fechainic' and '$fechafin' order by r.FechaPublicRes desc";


?>

<!DOCTYPE html>
<html>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Reporte</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/reporte.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/botones.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/cabecera.css'>
    <link rel="shortcut icon" href="img/logo_mdh.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='js/editardatos.js'></script>
</head>
<body>

    <?php

    include('cabecera.php');
    $fila = mysql_query($sql, $cn);

    ?>

    <div class="contenedor-tabla">

    <br>
    
    <div>
        <form action="reporte.php" method="post">
            <div class="contenedor-filtros">
                <input type="submit" value="Atras">
            </div>
        </form>
    </div>

    <table class="tabla-reporte">
            <tr class="fila">            
                <th>Número de Resolución</th>
                <th>Tipo de Resolución</th>
                <th>Contenido</th>
                <th>Fecha de Publicación</th>
                <?php
                if ($_SESSION["tipousuario"] == "ADMINISTRADOR") {
                ?>
                <th>Estado</th>
                <?php
                }
                ?>                
                <th colspan="3">Opciones</th> <!-- Debe contener 3 --->
            </tr>
            <?php
            while ($r = mysql_fetch_array($fila)) {                
            ?>
            <tr class="fila fila-datos">
                <td><?php echo $r["NumeroRes"]; ?></td>
                <td><?php echo utf8_encode($r["NombreTipoRes"]); ?></td>                
                <td><?php echo utf8_encode($r["ContenidoRes"]); ?></td>
                <td><?php echo $r["FechaPublicRes"]; ?></td>
                <?php
                if($_SESSION["tipousuario"] == "ADMINISTRADOR"){
                ?>
                <td><?php echo $r["NombreEstado"]; ?></td>
                <?php
                }
                ?>
                <?php
                    $file_path = 'resoluciones/'.$r["NumeroRes"].'.pdf';
                    if (file_exists($file_path)) {
                        ?>
                        <td><a target="_blank" href="php/p_descargarpdf.php?num=<?php echo $r["NumeroRes"]; ?>"><img class="img-pdf" src="img/pdf-icon.png" alt="descargar_resolución"></a></td> 
                        <?php
                    }
                if($_SESSION["tipousuario"] == "ADMINISTRADOR"){
                ?>             
                <td>
                    <div class="Boton2"><a href="registroresolucion.php?num=<?php echo $r["NumeroRes"]; ?>">Editar</a></div>
                </td>
                <?php
                }
                if ($_SESSION["tipousuario"] == "ADMINISTRADOR") {
                    if ($r["NombreEstado"] == "HABILITADO") {
                ?>
                <td>
                    <div class="Boton2"><a href="php/p_inhabilitar.php?num=<?php echo $r["NumeroRes"]; ?>">Inhabilitar</a></div>
                </td>
                <?php
                    } else {
                    ?>
                        <td>
                            <div class="Boton2"><a href="php/p_inhabilitar.php?num=<?php echo $r["NumeroRes"]; ?>">Habilitar</a></div>
                        </td>
                    <?php
                    }
                }
                ?>
            </tr>
            <?php
            }
            ?>
            
        </table>

    </div>

</body>
</html>