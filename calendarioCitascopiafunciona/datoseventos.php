<?php
header('Content-Type:application/json');
require('conexion.php');

$conexion=regresarConexion();
// validar antes de cualquier cosa


switch ($_GET['accion']){
    case 'listar':
        $datos=mysqli_query($conexion,"SELECT idCita as id ,titulo as title,descripcion,
        inicio as start,fin as end,idPaciente1,idMedico1,colortexto as textColor,colorfondo as backgroundColor from citas WHERE estado='activo'");
         $resultado=mysqli_fetch_all($datos,MYSQLI_ASSOC);
         echo json_encode($resultado);
        break;
        
    case 'agregar':
        $respuesta=mysqli_query($conexion,"INSERT INTO citas(titulo,descripcion,inicio,fin,idPaciente1,idMedico1,colortexto,colorfondo) VALUES ('$_POST[titulo]','$_POST[descripcion]','$_POST[inicio]','$_POST[fin]','$_POST[idPaciente1]','$_POST[idMedico1]','$_POST[textColor]','$_POST[backgroundColor]')");
        echo json_encode($respuesta);
        break;
        
    case 'modificar':
      
        $datos=mysqli_query($conexion,"UPDATE citas SET titulo='$_POST[titulo]',descripcion='$_POST[descripcion]',inicio='$_POST[inicio]',fin='$_POST[fin]',IdPaciente1='$_POST[idPaciente1]',idMedico1='$_POST[idMedico1]',colortexto='$_POST[textColor]',colorfondo='$_POST[backgroundColor]'WHERE idCita='$_POST[id]'");
        echo json_encode($datos);
        break;
        
    case 'borrar':
        $datos=mysqli_query($conexion,"UPDATE citas SET estado='no' WHERE idCita='$_POST[id]'");
        echo json_encode($datos);
         break;
    
    default:
 
        break;
}


?>