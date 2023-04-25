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
    <title>Registrar Asistente</title>
    <link rel='stylesheet' type='text/css' media='screen' href='css/cabecera.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/registros3.css'>
    <link rel="shortcut icon" href="img/logo_mdh.png">
    <script src="js/editardatos.js"></script>
</head>
<body>
    <?php 
    include("cabecera.php");

    //consulta para codigo
    $sqlCodigo="select  u.CodigoUsu
                from usuario u, tipousuario tp
                where u.IdtipoUsu = tp.IdtipoUsu
                        and tp.IdTipoUsu =2
                order by u.CodigoUsu desc";
    $filacod=mysql_query($sqlCodigo,$cn);
    $CodigoNuevo= "ASI000001";
   
    while($rcod=mysql_fetch_array($filacod)){
        
            $eval=explode("I",$rcod['CodigoUsu']);
                $Nuevoeval=$eval[1];
                $codi = $Nuevoeval + 1;
                if($codi<=9){
                        $CodigoNuevo = $eval[0] ."I00000" .$codi;
                       
                }elseif($codi>=10 && $codi<100){
                        $CodigoNuevo = $eval[0] ."I0000" .$codi;
                        
                }elseif($codi>=100 && $codi<1000){
                    $CodigoNuevo = $eval[0] ."I00" .$codi;
                   
                }elseif($codi>=1000 && $codi<10000){
                    $CodigoNuevo = $eval[0]."I0" .$codi;
                    
                }else{
                    $CodigoNuevo = $eval[0] ."I" .$codi;
                   
                }
                break;           
    }

    
     

    ?>
    <div class="contenedor contenedor-res">
    <div class="Grid">
        <form action="php/p_registrarusuario.php" method="post" >
                <div class="Contenedor1">
                    <div class="Premisa1">Código:</div>
                    <div class="Campo1"><input type="text" id="txt_codigo" name="txt_codigo" class="caja caja-mediana" readonly value="<?php echo $CodigoNuevo;?>"></div>
                </div>
                <div class="Contenedor2">
                    <div class="Premisa2">Nombre:</div>
                    <div class="Campo2"><input type="text" id="txt_nombre" name="txt_nombre" class="caja caja-mediana" ></div>
                </div>
                <div class="Contenedor3">
                    <div class="Premisa3">A. Paterno:</div>
                    <div class="Campo3"><input type="text" id="txt_apaterno" name="txt_apaterno" class="caja caja-mediana" ></div>
                </div>
                <div class="Contenedor4">
                    <div class="Premisa4">A. Materno:</div>
                    <div class="Campo4"><input type="text" id="txt_amaterno" name="txt_amaterno" class="caja caja-mediana"></div>
                </div>
                <div class="Contenedor5">
                    <div class="Premisa5">DNI:</div>
                    <div class="Campo5"><input type="text" id="txt_dni" name="txt_dni" class="caja caja-mediana"></div>
                </div>
                <div class="Boton" id="contenedor-submit"><input id="btn_enviar" type="submit" value="Guardar"> </div>
            
        </form>
        </div>
    </div>
</body>
</html>