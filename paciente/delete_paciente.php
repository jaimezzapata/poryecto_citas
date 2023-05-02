<?php
    require 'database.php';
    $con=mysqli_connect("localhost","root","","qpdata");

    $del_msg ="";

    if (isset($_GET['idPaciente'])) {
        $idPaciente = $_GET['idPaciente'];
        $query="SELECT * FROM citas WHERE idPaciente1=$idPaciente";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) >= 1) {
            if (mysqli_num_rows($result) > 1) {
            $del_msg ="El paciente tiene varias citas agendadas, no es posible eliminar";
            }else{
                $del_msg = "El paciente tiene una cita agendada, no es posible eliminar";
            }
        }else{
            $query = "DELETE FROM paciente WHERE idPaciente = '$idPaciente'";
            $result = mysqli_query($con, $query);
            if (!$result) {
                die($del_msg = "No se pudo eliminar el paciente");
            }
        }
    }

    header("Location: index_paciente.php?del_msg=$del_msg");
?>


