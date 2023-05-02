<?php 
include('ds.php');

$idMedico=trim($_POST['idMedico']);
$tipoDocumento=trim($_POST['tipoDocumento']);
$nombreMedico=trim($_POST['nombreMedico']);
$direccion=trim($_POST['direccion']);
$telefono=trim($_POST['telefono']);
$email=trim($_POST['email']);
$idusuarioss=trim($_POST['idusuarioss']);
$imagen=$_FILES['imagen']['name'];

if($imagen!=""){
    $sentencia = $bd->prepare("UPDATE medico SET idMedico=?, tipoDocumento= ?,nombreMedico=?,direccion= ?,telefono=?,email=?,idusuarioss=?,imagen=? WHERE idMedico=? " );
    $resultado =$sentencia->execute([$idMedico,$tipoDocumento,$nombreMedico,$direccion,$telefono,$email,$idusuarioss,$imagen,$idMedico]);
    $carpeta="./files/";

    opendir($carpeta);
    $destino=$carpeta.$_FILES['imagen']['name'];
    copy($_FILES['imagen']['tmp_name'],$destino);
}else{
    $sentencia = $bd->prepare("UPDATE medico SET idMedico=?, tipoDocumento= ?,nombreMedico=?,direccion= ?,telefono=?,email=?,idusuarioss=? WHERE idMedico=? " );
    $resultado =$sentencia->execute([$idMedico,$tipoDocumento,$nombreMedico,$direccion,$telefono,$email,$idusuarioss,$idMedico]);
}


if($resultado===TRUE){
   
    header('Location:medicos.php');
}


?>

