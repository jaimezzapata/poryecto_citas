<?php
include("ds.php");

$idMedico=trim($_POST['idMedico']);
$tipoDocumento=trim($_POST['tipoDocumento']);
$nombreMedico=trim($_POST['nombreMedico']);
$direccion=trim($_POST['direccion']);
$telefono=trim($_POST['telefono']);
$email=trim($_POST['email']);
$idusuarioss=trim($_POST['idusuarioss']);
$imagen=$_FILES['imagen']['name'];

$carpeta="./files/";
opendir($carpeta);
$destino=$carpeta.$_FILES['imagen']['name'];
copy($_FILES['imagen']['tmp_name'],$destino);

/*$nombre=$_FILES['imagen']['name'];
echo "<img src=\"files/$nombre\">";*/



$sentencia = $bd->prepare("INSERT INTO medico(idMedico,tipoDocumento,nombreMedico,direccion,telefono,email,idusuarioss,imagen) VALUES(?,?,?,?,?,?,?,?);");
$resultado =$sentencia->execute([$idMedico,$tipoDocumento,$nombreMedico,$direccion,$telefono,$email,$idusuarioss,$imagen]);


if($resultado===TRUE){
    echo ("Insertado con éxito en la base de datos");
    header('Location:medicos.php');
}

?>

