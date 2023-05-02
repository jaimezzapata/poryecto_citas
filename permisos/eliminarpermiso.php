<?php 
$id=$_GET['id'];
include 'ds.php';
if(!isset($_GET['id'])){
    header('Location:permisos.php');

}
$codigo=$_GET['id'];
$desactivado='Desactivado';
$sentencia=$bd->prepare("UPDATE  permiso SET estado=? WHERE idPermiso=?;");
$resultado=$sentencia->execute([$desactivado,$id]);
header('Location:permisos.php');
?>