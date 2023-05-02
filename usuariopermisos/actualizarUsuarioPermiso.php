<?php 
include('ds.php');

$idUsuarioPermiso=trim($_POST['idUsuarioPermiso']);
$idPermiso1=trim($_POST['idPermiso1']);
$idUsuario1=trim($_POST['idUsuario1']);



$sentencia = $bd->prepare("UPDATE usuariopermiso SET idUsuarioPermiso=?, idPermiso1= ?,idUsuario1=? WHERE idUsuarioPermiso=? " );
$resultado =$sentencia->execute([$idUsuarioPermiso,$idPermiso1,$idUsuario1,$idUsuarioPermiso]);


if($resultado===TRUE){
   
    header('Location:usuariopermiso.php');
}


?>

