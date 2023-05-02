<?php
include("ds.php");

$idUsuario=trim($_POST['idUsuario']);
$tipoDocumento=trim($_POST['tipoDocumento']);
$direccion=trim($_POST['direccion']);
$telefono=trim($_POST['telefono']);
$email=trim($_POST['email']);
$login=trim($_POST['login']);
$clave=trim($_POST['clave']);
$cargo=trim($_POST['cargo']);
$imagen=$_FILES['imagen']['name'];

$carpeta="./files/";
opendir($carpeta);
$destino=$carpeta.$_FILES['imagen']['name'];
copy($_FILES['imagen']['tmp_name'],$destino);

/*$nombre=$_FILES['imagen']['name'];
echo "<img src=\"files/$nombre\">";*/



$sentencia = $bd->prepare("INSERT INTO usuario(idUsuario,tipoDocumento,direccion,telefono,email,loginusr,clave,imagen,cargo) VALUES(?,?,?,?,?,?,?,?,?);");
$resultado =$sentencia->execute([$idUsuario,$tipoDocumento,$direccion,$telefono,$email,$login,$clave,$imagen,$cargo]);


if($resultado===TRUE){
    echo ("Insertado con éxito en la base de datos");
    header('Location:usuarios.php');
}

?>

