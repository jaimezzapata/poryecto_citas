<?php 
$id=$_GET['id'];
include 'ds.php';
if(!isset($_GET['id'])){
    header('Location:usuarios.php');

}
$codigo=$_GET['id'];
$desactivado='Desactivado';
$sentencia=$bd->prepare("UPDATE  usuario SET estado=? WHERE idUsuario=?;");
$resultado=$sentencia->execute([$desactivado,$id]);
header('Location:usuarios.php');
?>