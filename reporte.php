<?php

include('php/funciones.php');
VerificarDatos();
include("php/conexion.php");
VerificarSesion();

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


    
    
    //$sql = "select r.*, tr.*, e.* from resolucion r, tiporesolucion tr, estado e where r.IdTipoRes = tr.IdTipoRes and r.IdEstado = e.IdEstado order by r.FechaPublicRes desc";
    //Paginacion
    
    if (isset($_GET["valor"])) {
        $v = $_GET["valor"];

        
        $sql = "select r.*, tr.*, e.* from resolucion r, tiporesolucion tr, estado e where r.IdTipoRes = tr.IdTipoRes and r.IdEstado = e.IdEstado order by r.FechaPublicRes desc limit $v,10";
        
        //$sql = "select * from alumno limit $v,30";
    }else{
        
        $sql = "select r.*, tr.*, e.* from resolucion r, tiporesolucion tr, estado e where r.IdTipoRes = tr.IdTipoRes and r.IdEstado = e.IdEstado order by r.FechaPublicRes desc limit 0,10";
    }


    $fila = mysql_query($sql, $cn);
    ?>

    <div class="contenedor-tabla">

        <br>
        <div>
            <div class="contenedor-filtros">
                Filtro:
                <input type="text" name="txtfiltro" id="filtro">
            </div>
        </div>

        <br>

        <div>
            <form action="reportefecha.php" method="post">
                <div class="contenedor-filtros">
                    Fecha de Inicio:
                    <input type="date" name="fechainicio">
                    Fecha de Fin:
                    <input type="date" name="fechafin">
                    <input type="submit" value="Filtrar por Fechas">
                </div>
            </form>
        </div>

        <br>

        <form action="reporteTipo.php" method="post">
            <div class="contenedor-filtros">
                Tipo Resolución:
                <select name="lst_TR" id="">
                        <?php
                        $tipor= "select * from tiporesolucion";
                        $filatipor =mysql_query($tipor,$cn);
                        while($rtipo=mysql_fetch_array($filatipor)){
                        ?>
                        <option value="<?php echo $rtipo['IdTipoRes'];?>"><?php echo utf8_encode($rtipo['NombreTipoRes']);?></option>
                        <?php
                        }
                        ?>

                    </select>
                    <input type="submit" value="Filtrar por Tipo">
            </div>
        </form>
            
            <script>
                $(document).ready(function(){
                    $("#filtro").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                        $(".contenedor-tabla tr.fila-datos").filter(function() {
                            var tdValue = $(this).find('td:eq(0)').text().toLowerCase(); // Evalúa el contenido del primer <td> de la fila 
                            var tdValue1 = $(this).find('td:eq(2)').text().toLowerCase();// Evalúa el contenido del tercer <td> de la fila 
                            if (tdValue.indexOf(value) > -1 || tdValue1.indexOf(value) > -1) {
                                    $(this).show(); // Si el valor está presente en el <td>, muestra la fila
                                } else {
                                    $(this).hide(); // Si el valor no está presente en el <td>, oculta la fila
                                }
                        });
                    });
                });
            </script>

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
        <br>
        <br>
        <?php
		$cantidad = 10;
       
            $sql1 = "select r.*, tr.*, e.* from resolucion r, tiporesolucion tr, estado e where r.IdTipoRes = tr.IdTipoRes and r.IdEstado = e.IdEstado order by r.FechaPublicRes desc";
        
		
		$filas = mysql_query($sql1);
		$total = mysql_num_rows($filas);

		$numpaginas = $total/$cantidad;

		$numpaginas = ceil($numpaginas);

		for ($i=0; $i < $numpaginas ; $i++) { 
			$parametro = $i * 10;

            ?>

            <div class="contenedor-boton">
                <a href = 'reporte.php?valor=<?php echo $parametro; ?>'><?php echo ($i+1); ?></a>&nbsp;&nbsp;&nbsp;&nbsp
            </div>

            <?php
		}
		?>

    </div>
    <br>

</body>
</html>