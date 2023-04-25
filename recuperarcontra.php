<?php
include('php/funciones.php');
//VerificarDatos();
include("php/conexion.php");
//VerificarSesion(); 

include("php/p_recuperarcontra.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Asistente</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/cabecera.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/registros4.css'>
    <link rel="shortcut icon" href="img/logo_mdh.png">
    <script src="js/editardatos.js"></script>
</head>
<body>
    <?php 
  //  include("cabecera.php");
    ?>
    <div class="contenedor-boton">
        <h2>INGRESE SUS DATOS PERSONALES CORRECTOS</h2>
    </div>
    <div class="contenedor contenedor-res">
    <div class="Grid">
        <form action="#" method="post" >
                <div class="Contenedor1">
                    <div class="Premisa1">Código:</div>
                    <div class="Campo1"><input type="text" id="txt_codigo" name="txt_codigo" class="caja caja-mediana" required></div>
                </div>
                <div class="Contenedor2">
                    <div class="Premisa2">Nombre:</div>
                    <div class="Campo2"><input type="text" id="txt_nombre" name="txt_nombre" class="caja caja-mediana" required></div>
                </div>
                <div class="Contenedor3">
                    <div class="Premisa3">A. Paterno:</div>
                    <div class="Campo3"><input type="text" id="txt_apaterno" name="txt_apaterno" class="caja caja-mediana" required></div>
                </div>
                <div class="Contenedor4">
                    <div class="Premisa4">A. Materno:</div>
                    <div class="Campo4"><input type="text" id="txt_amaterno" name="txt_amaterno" class="caja caja-mediana" required></div>
                </div>
                <div class="Contenedor5">
                    <div class="Premisa5">DNI:</div>
                    <div class="Campo5"><input type="text" id="txt_dni" name="txt_dni" class="caja caja-mediana" required></div>
                </div>
                <div class="Contenedor6">
                    <div class="Premisa6">Tipo Usuario:</div>
                    <div class="Campo6">
                    <select name="lst_tipoUsu" class="caja caja-mediana" required>
                        <?php
                        $sql = "select * from tipousuario";
                        $fila = mysql_query($sql,$cn);
                        while($r=mysql_fetch_array($fila)){
                        ?>
                        <option value="<?php echo $r['IdTipoUsu'];?>"><?php echo utf8_encode($r['NombreTipoUsu']);?></option>
                        <?php
                        }
                        ?>
                    </select>
                    </div>
                </div>
                <div class="contenedor-boton">
                    <div>
                        <input id="btn_enviar" name ="Recuperar" type="submit" value="Recuperar"> 
                    </div>                
                    <div class="Boton2"><a href="index.php">Cancelar</a></div>
                </div>
                
                <br><br>

                <div class="contenedor-boton">
                    <?php 
                    echo $_opc;
                    ?>
                </div>
        </form>
        </div>
    </div>
</body>
</html>