<?php

function regresarConexion(){
    $server='localhost';
    $user='root';
    $clave='';
    $base="qpdata";
    $conexion=mysqli_connect($server,$user,$clave,$base) or die ("Problemas con la conexión");
    mysqli_set_charset($conexion,'utf8');  
    return $conexion;
}



?>