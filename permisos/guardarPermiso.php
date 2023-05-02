<?php
include("ds.php");

$idPermiso=trim($_POST['idPermiso']);
$nombre=trim($_POST['nombre']);




$sentencia = $bd->prepare("INSERT INTO permiso(idPermiso,nombre) VALUES(?,?);");
$resultado =$sentencia->execute([$idPermiso,$nombre]);


if($resultado===TRUE){
    echo ("Insertado con éxito en la base de datos");
    header('Location:permisos.php');
}

?>

