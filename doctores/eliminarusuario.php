<?php 
$id=$_GET['id'];
include 'ds.php';
if(!isset($_GET['id'])){
    header('Location:medicos.php');

}
$codigo=$_GET['id'];
$desactivado='Desactivado';
$sentencia=$bd->prepare("UPDATE  medico SET estado=? WHERE idMedico=?;");
$resultado=$sentencia->execute([$desactivado,$id]);
header('Location:medicos.php');
?>