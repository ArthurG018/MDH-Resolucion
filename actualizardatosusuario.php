<?php

include("php/conexion.php");
include('php/funciones.php');
VerificarSesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Resolucion</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/cabecera.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/registros2.css'>
    <link rel="shortcut icon" href="img/logo_mdh.png">
    <script src="js/editardatos.js"></script>
</head>
<body>
    <?php 
    include("cabecera.php");
    $_CodUsuario = $_SESSION["usuario"];
    $sql = "select u.*, tu.* from usuario u, tipousuario tu where u.CodigoUsu = '$_CodUsuario'";
    $fila = mysql_query($sql, $cn);
    $r = mysql_fetch_array($fila);
    ?>
    <div class="contenedor contenedor-res">
    <div class="Grid">
        <form action="php/p_actualizardatosusuario.php" method="post" enctype="multipart/form-data">
            
            <div class="Contenedor1">
                    <div class="Premisa1">Código:</div>
                    <div class="Campo1"><input type="text" id="txt_codigo" name="txt_codigo" class="caja caja-mediana" value="<?php echo $r['CodigoUsu'];?>" readonly></div>
                </div>
                <div class="Contenedor2">
                    <div class="Premisa2">Nombre:</div>
                    <div class="Campo2"><input type="text" id="txt_nombre" name="txt_nombre" class="caja caja-mediana" value="<?php echo utf8_encode($r['NombreUsu']);?>" readonly></div>
                </div>
                <div class="Contenedor3">
                    <div class="Premisa3">A. Paterno:</div>
                    <div class="Campo3"><input type="text" id="txt_apaterno" name="txt_apaterno" class="caja caja-mediana" value="<?php echo utf8_encode($r['PaternoUsu']);?>" readonly></div>
                </div>
                <div class="Contenedor4">
                    <div class="Premisa4">A. Materno:</div>
                    <div class="Campo4"><input type="text" id="txt_amaterno" name="txt_amaterno" class="caja caja-mediana" value="<?php echo utf8_encode($r['MaternoUsu']);?>" readonly></div>
                </div>
                <div class="Contenedor5">
                    <div class="Premisa5">DNI:</div>
                    <div class="Campo5"><input type="text" id="txt_dni" name="txt_dni" class="caja caja-mediana" value="<?php echo utf8_encode($r['DNIUsu']);?>" readonly></div>
                </div>
                <div class="Contenedor6">
                    <div class="Premisa6">Dirección:</div>
                    <div class="Campo6"><input type="text" id="txt_direccion" name="txt_direccion" class="caja caja-mediana" value="<?php echo utf8_encode($r['DireccionUsu']);?>" readonly></div>
                </div>
                <div class="Contenedor7">
                    <div class="Premisa7">Celular:</div>
                    <div class="Campo7"><input type="text" id="txt_celular" name="txt_celular" class="caja caja-mediana" value="<?php echo utf8_encode($r['CelularUsu']);?>" readonly></div>
                </div>
                <div class="Contenedor8">
                    <div class="Premisa8">Correo:</div>
                    <div class="Campo8"><input type="email" id="txt_email" name="txt_email" class="caja caja-mediana" value="<?php echo utf8_encode($r['EmailUsu']);?>" readonly></div>
                </div>
                <div class="Contenedor9">
                    <div class="Premisa9">Sexo:</div>
                    <div class="Campo9">
                    <?php
                            $_m="";
                            $_f="";
                            if($r['SexoUsu'] != null){

                                if($r['SexoUsu']=='M'){
                                    $_m=" checked";
                                }else{
                                    $_f=" checked";    
                                }
                            }
                            ?>
                        <input type="radio" name="opc_sexo" id="rbtnM" value="M"<?php echo $_m;?> disabled>Masculino
                        <input type="radio" name="opc_sexo" id="rbtnF" value="F"<?php echo $_f;?> disabled>Femenino
                </div>
                </div>
                <div class="Contenedor10">
                    <div class="Premisa10">F. Nacimiento:</div>
                    <div class="Campo10"><input type="date" id="date_FechaNac" name="txt_FechaNac" class="caja caja-mediana" value="<?php echo ($r['FechaNacUsu']);?>" readonly></div>
                </div>
                <br>                
                <div class="Boton" id="contenedor-submit"><!-- <input id="btn_enviar" type="submit" value="Guardar"> --></div>
            
        </form>
        <br>
        <div class="contenedor-boton">
            <button class="Boton2" id="btn_editar" onclick="CambiarEntradas()">Editar</button>
        </div>
        <br>
        </div>
    </div>
</body>
</html>