<?php 
$id=$_GET['id'];
include 'ds.php';
if(!isset($_GET['id'])){
    header('Location:usuariopermiso.php');

}
$codigo=$_GET['id'];
$desactivado='Desactivado';
$sentencia=$bd->prepare("UPDATE  usuariopermiso SET estado=? WHERE idUsuarioPermiso=?;");
$resultado=$sentencia->execute([$desactivado,$id]);
header('Location:usuariopermiso.php');
?>