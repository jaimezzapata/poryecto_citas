<?php 
include('ds.php');

$idPermiso=trim($_POST['idPermiso']);
$nombre=trim($_POST['nombre']);


$sentencia = $bd->prepare("UPDATE permiso SET idPermiso=?, nombre= ? WHERE idPermiso=? " );
$resultado =$sentencia->execute([$idPermiso,$nombre,$idPermiso]);


if($resultado===TRUE){
   
    header('Location:permisos.php');
}


?>

