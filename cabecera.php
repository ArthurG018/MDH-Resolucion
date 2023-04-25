<?php


$_CodUsuario = $_SESSION["usuario"];
$file_path = 'imgperfil/'.$_CodUsuario.'.png';

?>

<header>

    <a href="principal.php"><img class="logo" src="img/logo_cmp_mdh.png"></a>

    <nav>

        <ul class="enlaces">
            <li><a class="enlace-cabecera" href="principal.php">Inicio</a></li>
            <li>
                <a class="enlace-cabecera" href="#">Operaciones</a>
                <ul class="enlaces-sub">
                    <li><a class="enlace-cabecera" href="tiporesolucion.php">Registrar Tipo de Resolución</a></li>
                    <li><a class="enlace-cabecera" href="registroresolucion.php">Registrar Resolución</a></li>
                </ul>
            </li>
            <li><a class="enlace-cabecera" href="reporte.php">Reporte</a></li>
        </ul>

    </nav>
    

    <div class="contenedor-perfil">
        <div class="perfil">
            <label class="enlace-cabecera">Bienvenido</label>
            <ul class="enlaces-sub"> 
                <li><a class="enlace-cabecera" href="actualizardatosusuario.php">Revisar Datos</a></li>
                <li><a class="enlace-cabecera" href="cambiarpass.php">Cambiar Contraseña</a></li>
                <li><a class="enlace-cabecera" href="imagen.php">Foto de perfil</a></li>
                <?php
                if($_SESSION["tipousuario"] == "ADMINISTRADOR"){
                ?>
                <li><a class="enlace-cabecera" href="registrarusuario.php">Registrar Nuevo Usuario</a></li>
                <?php
                }?>
                <li><a class="enlace-cabecera" href="php/p_cerrarsesion.php">Cerrar Sesión</a></li>
                
            </ul>
        </div>
        <?php
        if (file_exists($file_path)) {
            ?>
            <a href="actualizardatosusuario.php"><img class="perfil-img" src="<?php echo $file_path; ?>"> </a>  
            <?php
        } else {
            ?>
            <a href="actualizardatosusuario.php"><img class="perfil-img" src="imgperfil/default.png">  </a> 
            <?php
        }
        ?>
             
    </div>

</header>