<?php
include('ds.php');

$id=$_GET['id'];
require('../usuarios/header.php');

$sentencia= $bd->prepare("SELECT *FROM usuariopermiso where idUsuarioPermiso=? ;");
$sentencia->execute([$id]);
$permiso= $sentencia->fetch(PDO::FETCH_OBJ);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ce5a622a17.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <title>Actualizar Usuario-Permiso</title>
</head>
<body >
    <h3 class="text-center mt-2 mb-3">Actualizar Registro</h1>
<div class="container-fluid  w-50 ">
<form class="" action="actualizarUsuarioPermiso.php" method="POST" enctype="multipart/form-data">
        
            
                    <div class="form-group">
                    <label for="exampleInputEmail1">Id Usuario-Permiso *</label>
                    <input name="idUsuarioPermiso" value="<?php echo $permiso->idUsuarioPermiso ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                    </div>

                     
                    <div class="form-group">
                    <label for="exampleInputEmail1">Id Permiso*</label>
                    <input name="idPermiso1" value="<?php echo $permiso->idPermiso1 ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Nro Documento Usuario*</label>
                    <input name="idUsuario1" value="<?php echo $permiso->idUsuario1 ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
            
            
       

        <button type="submit" class="btn mt-2 text-dark w-100">Guardar cambios</button>
        </form>
    
</div>

       
       
       
       
       
       
       
       
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>