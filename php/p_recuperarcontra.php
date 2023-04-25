<?php
$_opc=" ";
//include("conexion.php");
if(isset($_POST['Recuperar'])){
    //Primario
    $_codusu = $_POST['txt_codigo'];
    $_apater = utf8_decode($_POST['txt_apaterno']);
    $_amater = utf8_decode($_POST['txt_amaterno']);
    $_nombre = utf8_decode($_POST['txt_nombre']);
    $_dni = $_POST['txt_dni'];
    $_tpusu = $_POST['lst_tipoUsu'];
    
    
    $sql = "select * from usuario 
            where 
            CodigoUsu= '$_codusu' and
            PaternoUsu= '$_apater' and
            MaternoUsu= '$_amater' and 
            NombreUsu= '$_nombre' and 
            DNIUsu= '$_dni' and 
            IdTipoUsu= $_tpusu";
    
        $eval=mysql_query($sql,$cn);
        $r = mysql_fetch_array($eval);
        if($r['CodigoUsu']!=null){
            session_start();
            $_opc='1';
            $_SESSION["usuario"] = $_codusu;
            //mysql_close($cn);
            header('location: recuperacambia.php');
        }else{
            $_opc='DATOS ERRONEOS';
            //mysql_close($cn);
            //header('location: recuperarcontra.php');
        }
    
}elseif(isset($_POST['Cancelar'])){
    session_destroy();
    header('location: index.php');
}


?>