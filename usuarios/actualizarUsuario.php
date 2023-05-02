<?php 
include('ds.php');

$idUsuario=trim($_POST['idUsuario']);
$tipoDocumento=trim($_POST['tipoDocumento']);
$direccion=trim($_POST['direccion']);
$telefono=trim($_POST['telefono']);
$email=trim($_POST['email']);
$login=trim($_POST['login']);
$clave=trim($_POST['clave']);
$cargo=trim($_POST['cargo']);
$imagen=$_FILES['imagen']['name'];

if($imagen!=""){
    $sentencia = $bd->prepare("UPDATE usuario SET idUsuario=?, tipoDocumento= ?,direccion= ?,telefono=?,email=?,loginusr=?,clave=?,imagen=?,cargo=? WHERE idUsuario=? " );
    $resultado =$sentencia->execute([$idUsuario,$tipoDocumento,$direccion,$telefono,$email,$login,$clave,$imagen,$cargo,$idUsuario]);
    $carpeta="./files/";

    opendir($carpeta);
    $destino=$carpeta.$_FILES['imagen']['name'];
    copy($_FILES['imagen']['tmp_name'],$destino);
}else{
    $sentencia = $bd->prepare("UPDATE usuario SET idUsuario=?, tipoDocumento= ?,direccion= ?,telefono=?,email=?,loginusr=?,clave=?,cargo=? WHERE idUsuario=? " );
    $resultado =$sentencia->execute([$idUsuario,$tipoDocumento,$direccion,$telefono,$email,$login,$clave,$cargo,$idUsuario]);
}


if($resultado===TRUE){
   
    header('Location:usuarios.php');
}


?>

