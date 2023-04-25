<?php

session_start();

if ( $_SESSION["usuario"] == null) {
    
    header('location: ../index.html');
}else{
    header('location: ../principal.php');
}

?>