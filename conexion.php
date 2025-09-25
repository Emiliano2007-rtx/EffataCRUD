<?php
    define("SERVIDOR","localhost");
    define("USUARIO","root");
    define("PWD","12345678");
    define("BASE_DATOS","effata_db");

    $conexion = new mysqli(SERVIDOR,USUARIO,PWD,BASE_DATOS);

    if(!$conexion->connect_error){
        echo"";
    }
    else{
        echo"Error";
        $conexion->connect_error;
    }
?>