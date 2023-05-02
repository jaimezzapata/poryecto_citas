<?php
require 'database.php';
$con = mysqli_connect("localhost", "root", "", "qpdata");

$imagen="";
if (isset($_GET['idPaciente'])) {
    $idPaciente = $_GET['idPaciente'];
    $query = "SELECT * FROM paciente WHERE idPaciente=$idPaciente";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $idPaciente = $row['idPaciente'];
        $nombrePaciente = $row['nombrePaciente'];
        $direccion = $row['direccion'];
        $telefono = $row['telefono'];
        $email = $row['email'];
        $imagen = $row['imagen'];
        $estado = $row['estado'];
    }
}


if (isset($_POST['update'])) {

    $idPaciente = $_GET['idPaciente'];
    $nombrePaciente = $_POST['nombrePaciente'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    if (!empty($_FILES['imagen']['tmp_name'])) {
        $foto = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $query = "UPDATE paciente set nombrePaciente='$nombrePaciente', direccion='$direccion', telefono='$telefono', email='$email', imagen='$foto',estado='$estado' WHERE idPaciente='$idPaciente'";
    } else {
        $query = "UPDATE paciente set nombrePaciente='$nombrePaciente', direccion='$direccion', telefono='$telefono', email='$email',estado='$estado' WHERE idPaciente='$idPaciente'";
    }
    mysqli_query($con, $query);
    header('Location: index_paciente.php');
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Actualizar Paciente</title>
    <link rel="icon" type="image/jpg" href="assets/img/favicon_qp.ico" />
    <!--Hoja de Estilos-->
    <link rel="stylesheet" href="styles_paciente.css">
    <!--Bootstrap-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rock+Salt&display=swap" rel="stylesheet">
    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/b28ebccb46.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="body_db">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid text-white">
                <a class="navbar-brand rockSalt ms-3" href="index_paciente.php">QuiroPlus</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index_paciente.php">
                                <i class="fas fa-users"></i>
                                Pacientes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mt-3 d-flex justify-content-center ">

        <form action="edit_paciente.php?idPaciente=<?php echo $_GET['idPaciente']; ?>" method="POST" class="col-5 db_editar" enctype="multipart/form-data">
            <h3 class="oswald d-flex justify-content-center mb-2">Ingrese datos del Paciente</h3>
            <label class="mb-1  text-success font-weight-bold"><strong>Nombre Paciente</strong></label>
            <input type="text" class="form-control mb-2" name="nombrePaciente" placeholder="Nombre Paciente" value="<?php echo $row['nombrePaciente'] ?>">
            <label class="mb-1 text-success"><strong>Dirección Paciente</strong></label>
            <input type="text" class="form-control mb-2" name="direccion" placeholder="Dirección" value="<?php echo $row['direccion'] ?>">
            <label class="mb-1 text-success"><strong>Teléfono Paciente</strong></label>
            <input type="text" class="form-control mb-2" name="telefono" placeholder="Teléfono" value="<?php echo $row['telefono'] ?>">
            <label class="mb-1 text-success"><strong>Email Paciente</strong></label>
            <input type="email" class="form-control mb-2" name="email" placeholder="Email" value="<?php echo $row['email'] ?>">
            <label class="mb-1 text-success"><strong>Foto Paciente</strong></label>

            <!--<input type="text" class="form-control mb-2" name="imagen" placeholder="Imagen" value="</?php echo $row['imagen'] ?>"> -->
            <div class="mt-1 mb-2 d-flex justify-content-center">
                <img class="img_edit_paciente zoom_paciente" height="100px" class="form-control mb-2" src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>" />
            </div>

            <input type="file" class="form-control mb-3" name="imagen" placeholder="Foto">

            <label class="mb-1 text-success"><strong>Estado Paciente</strong></label>
            <input type="text" class="form-control mb-2" name="estado" placeholder="Estado" value="<?php echo $row['estado'] ?>">

            <div class="d-flex justify-content-center">
                <input type="submit" class="btn btn-success btn-block" name="update" value="Actualizar">
            </div>
        </form>
        </div>
    </main>

    <footer class="footer_paciente d-flex justify-content-center mt-3">
        <h4 class="rockSalt mt-3 mb-3">QuiroPlus</h4>
    </footer>


</body>

</html>