<?php
include("ds.php");

$idUsuarioPermiso=trim($_POST['idUsuarioPermiso']);
$idPermiso=trim($_POST['idPermiso1']);
$idUsuario1=trim($_POST['idUsuario1']);



$sentencia = $bd->prepare("INSERT INTO usuariopermiso(idUsuarioPermiso,idPermiso1,idUsuario1) VALUES(?,?,?);");
$resultado =$sentencia->execute([$idUsuarioPermiso,$idPermiso,$idUsuario1]);


if($resultado===TRUE){
    echo ("Insertado con éxito en la base de datos");
    header('Location:usuariopermiso.php');
}

?>

