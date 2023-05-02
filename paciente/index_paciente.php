<?php
    require('../usuarios/header.php');
    require 'database.php';
    $con=mysqli_connect("localhost","root","","qpdata");

    $message = '';
    


//Registrar Paciente
    if(isset($_POST['enviar_paciente'])){

        if(!empty($_POST["idPaciente"]) && !empty($_POST['nombrePaciente']) && !empty($_POST['direccion']) && !empty($_POST['telefono']) && !empty($_POST['email']) ){

            $idPaciente = $_POST['idPaciente'];
            $nombrePaciente  = $_POST['nombrePaciente'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
            $foto = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

            $sql = "INSERT INTO paciente (idPaciente, nombrePaciente, direccion, telefono, email,imagen) VALUES ('$idPaciente', '$nombrePaciente', '$direccion', '$telefono', '$email', '$foto')";
                $resultado = $connection->query($sql);

                if($resultado){
                    $message = 'Paciente registrado correctamente';
                } else {
                    $message = 'Error al registrar Paciente';
                }
        }else {
            $message = 'Ingrese todos los datos';
        }
    }

    //Buscar Paciente
    if(isset($_POST['buscar_paciente'])) {
        if(!empty($_POST["idPaciente"])){
            $idPaciente = $_POST['idPaciente'];
            $query="SELECT * FROM paciente WHERE idPaciente=$idPaciente";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $idPaciente = $row['idPaciente'];
                $nombrePaciente=$row['nombrePaciente'];
                $direccion=$row['direccion'];
                $telefono=$row['telefono'];
                $email=$row['email'];
                $imagen=$row['imagen'];
                $estado=$row['estado'];
            }else{
                $message ='No existen pacientes con el ID ingresado';
            }
        }else{
            $message ='Ingrese el ID del paciente para realizar la busqueda';
        }
    }

    if (isset($_GET['del_msg'])) {
        $del_msg = $_GET['del_msg'];
    }

    //Limpiar Paciente
    if(isset($_POST['limpiar_campos'])) {
            $row = ("");
    }


    function function_alert($message) {
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

    $sql="SELECT *  FROM paciente";
    $query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link rel="icon" type="image/jpg" href="assets/img/favicon_qp.ico"/>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!--Hoja de Estilos-->
    <link rel="stylesheet" href="styles_paciente.css">
    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&family=Rock+Salt&display=swap" rel="stylesheet">
    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/b28ebccb46.js" crossorigin="anonymous"></script>

</head>
<body class="body_db">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid text-white">
                <a class="navbar-brand rockSalt ms-3" href="../index.html">QuiroPlus</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"      aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index_paciente.php">
                                <i class="fas fa-users"></i>
                                Pacientes</a>
                        </li>
                        <li><button style="height:50px;width:500px" ><a style="text-decoration:none ;" class="text-light" href="reportes.php"><img class="img-fluid bg-dark" style="width:50px; height:50px" src="../images/file-pdf-regular.svg">Descargar Pacientes</a> </button></li>
                       
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <?php if(!empty($message)): ?>
            <?php function_alert($message); ?>
    <?php endif; ?>

    <?php if(!empty($del_msg)): ?>
            <?php function_alert($del_msg); ?>
    <?php endif; ?>


    <main class="db_table">
        <div class="container-fluid mt-2">
                <div class="row">

                    <div class="col-md-3">
                        <h3 class="oswald d-flex justify-content-center mb-3">Ingrese datos del Paciente</h3>

                            <form action="index_paciente.php" method="POST" enctype="multipart/form-data">
                                <input type="number"  class="form-control mb-3" name="idPaciente" placeholder="Identificación a ingresar o buscar"
                                <?php
                                if(isset($_POST['buscar_paciente'])){
                                    if(!empty($_POST["idPaciente"])){
                                        if (mysqli_num_rows($result) == 1) {
                                        ?>value="<?php echo $row['idPaciente']?>"<?php
                                ;}}}?>}>

                                <input type="text"  class="form-control mb-3" name="nombrePaciente" placeholder="Nombre"
                                <?php
                                if(isset($_POST['buscar_paciente'])){
                                    if(!empty($_POST["idPaciente"])){
                                        if (mysqli_num_rows($result) == 1) {
                                        ?>value="<?php echo $row['nombrePaciente']?>"<?php
                                ;}}}?>}>

                                <input type="text"  class="form-control mb-3" name="direccion" placeholder="Dirección"
                                <?php
                                if(isset($_POST['buscar_paciente'])){
                                    if(!empty($_POST["idPaciente"])){
                                        if (mysqli_num_rows($result) == 1) {
                                        ?>value="<?php echo $row['direccion']?>"<?php
                                ;}}}?>}>

                                <input type="text"  class="form-control mb-3" name="telefono" placeholder="Teléfono"
                                <?php
                                if(isset($_POST['buscar_paciente'])){
                                    if(!empty($_POST["idPaciente"])){
                                        if (mysqli_num_rows($result) == 1) {
                                        ?>value="<?php echo $row['telefono']?>"<?php
                                ;}}}?>}>

                                <input type="email"  class="form-control mb-3" name="email" placeholder="Email"
                                <?php
                                if(isset($_POST['buscar_paciente'])){
                                    if(!empty($_POST["idPaciente"])){
                                        if (mysqli_num_rows($result) == 1) {
                                        ?>value="<?php echo $row['email']?>"<?php
                                ;}}}?>}>

                                <input type="file"  class="form-control mb-3" name="imagen" accept="image/jpeg">

                                <div class="d-flex justify-content-center">
                                  <input type="submit" class="btn me-1  " value="Registrar" name="enviar_paciente">
                                  
                                    <input type="submit" class="btn me-1  " value="Buscar" name="buscar_paciente">
                                      
                                   <input type="submit" class="btn me-1  " value="Limpiar" name="limpiar_campos">
                                </div>
                            </form>
                    </div>

                    <div class="col-md-9">
                        
                        <table class="table" >
                            <thead class="table-success table-striped oswald">
                                <tr>
                                    <th scope="col" class="theader">Identificación</th>
                                    <th scope="col" width="15%" style="margin-right: 0;"class="theader">Nombre</th>
                                    <th scope="col" width="15%" style="margin-right: 0;"class="theader">Dirección</th>
                                    <th scope="col" class="theader">Teléfono</th>
                                    <th scope="col" class="theader">Email</th>
                                    <th scope="col" class="theader">Foto</th>
                                    <th scope="col" class="theader">Estado</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php while($row=mysqli_fetch_array($query)): ?>
                                    <tr>
                                        <td><?php echo $row['idPaciente']; ?></td>
                                        <td><?php echo $row['nombrePaciente']; ?></td>
                                        <td><?php echo $row['direccion']; ?></td>
                                        <td><?php echo $row['telefono']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td class="d-flex justify-content-center"><img class="zoom_paciente"height="60px" src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']); ?>"/></td>
                                        <td><?php echo $row['estado']; ?></td>
                                        <td>
                                            <a href="edit_paciente.php?idPaciente=<?php echo $row['idPaciente'];?> "class="btn ">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="delete_paciente.php?idPaciente=<?php echo $row['idPaciente'];?>" class="btn ">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </main>

    <footer class="footer_paciente d-flex justify-content-center mt-2">
        <h4 class="rockSalt mt-3 mb-3">QuiroPlus</h4>
    </footer>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>