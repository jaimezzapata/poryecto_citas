<?php
    ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table{
            margin-left: 50px;
            width: 100vw;
            max-width: 80vw;
            border-collapse: collapse;
            border-radius: 25px;
            margin-right: 20px;
        }
        th {
            font-style: italic;
            text-align: center;
            background-color:cornflowerblue; 
            color: white;
            height: 70px;
            padding: 15px;
            border-bottom: 1px solid cornflowerblue;
            max-width: max-content;
        }
        td{
            text-align: center;
            padding: 15px;
            border-bottom: 1px solid cornflowerblue;
            max-width: 80vw;
        }
        
        
    </style>
</head>
<body>
<?php
    $host="localhost";
    $bd="qpdata";
    $usuario="root";
    $contrasena="";
        // prueba de conexion  a la db
     try {
        $conexion=new  PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasena);
        if($conexion){echo "";}
    } catch (Exception $ex) {
       echo $ex->getMessage();
    }

    $sentenciaSQL= $conexion->prepare("SELECT*FROM paciente where estado='activo'");
    $sentenciaSQL ->execute();
    $listaPacientes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>


    <div>
        
    <table class="table">
       
        <thead>
       
            <tr>
                <th>Nro Documento</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Email</th>
                
            </tr>
        </thead>
        <tbody>
        <?php  foreach($listaPacientes as $paciente) {?>
            <tr>
                <td><?php echo $paciente['idPaciente']; ?></td>
                <td><?php echo $paciente['nombrePaciente']; ?></td>
                <td><?php echo $paciente['direccion']; ?></td>
                <td><?php echo $paciente['telefono']; ?></td>
                <td><?php echo $paciente['email']; ?><td>
               
            </tr>
        <?php } ?>
        </tbody>
    </table>
                    
    </div>
</body>
</html>
<?php 
    $html=ob_get_clean();
    //echo $html;

    require_once '../paciente/librerias/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;
    $dompdf = new Dompdf();

    $options= $dompdf->getOptions();
    $options->set(array('isRemoteEnabled'=> true));
    $dompdf->setOptions($options);

    $dompdf->loadHtml($html);

    $dompdf->setPaper('letter');
    //$dompdf->setPaper('A4','landscape');

    $dompdf->render();

    $dompdf->stream("Paciente_.pdf", array('Attachment'=> false));
?>
