<?php
include('ds.php');

$id=$_GET['id'];
require('../usuarios/header.php');

$sentencia= $bd->prepare("SELECT *FROM usuario where idUsuario=? ;");
$sentencia->execute([$id]);
$usuario= $sentencia->fetch(PDO::FETCH_OBJ);
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
    <title>Actualizar Usuario</title>
</head>
<body >
    <h3 class="text-center mt-2 mb-3">Actualizar Registro</h1>
<div class="container-fluid  w-50 ">
<form class="" action="actualizarUsuario.php" method="POST" enctype="multipart/form-data">
        <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nro. de Documento *</label>
                    <input name="idUsuario" value="<?php echo $usuario->idUsuario ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" email">
                    <small id="emailHelp" class="form-text text-muted"></small>
            </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Tipo de documento *</label>
                        <select name="tipoDocumento"     class="form-control" id="exampleFormControlSelect2">
                            <option value="<?php echo $usuario->tipoDocumento ?>"><?php echo $usuario->tipoDocumento ?></option>
                            <option value="Cédula de ciudadania">Cédula de ciudadania</option>
                            <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Otro">Otro</option>
                        </select>
                    <small id="emailHelp" class="form-text text-muted">Seleccione un tipo de documento</small>
                    </div>
                </div>
            </div>
         

            <div class="row">

                <div class="col-md-6">
                     
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dirección *</label>
                        <input name="direccion"  value="<?php echo $usuario->direccion ?>"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>

                <div class="col-md-6">
                           
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefono *</label>
                        <input name="telefono"  value="<?php echo $usuario->telefono ?>"  type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
          </div>
          
          <div class="form-group">
                <label for="exampleInput1">Email *</label>
                <input name="email"  value="<?php echo $usuario->email ?>"  type="text" class="form-control" id="exampleInput1" placeholder="">
                <small id="emailHelp" class="form-text text-muted">Ingrese un correo válido</small>
            </div>
            
            <div class="form-group">
                <label for="exampleInput1">Cargo *</label>
                <input name="cargo" value="<?php echo $usuario->cargo ?>"   type="text"  class="form-control" id="exampleInput1" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInput1">Usuario *</label>
                <input name="login"  value="<?php echo $usuario->loginusr ?>"  type="text" class="form-control" id="exampleInput1" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInput1">Contraseña *</label>
                <input name="clave"  value="<?php echo $usuario->clave ?>"  type="text" class="form-control" id="exampleInput1" placeholder="">
            </div>
            <div class="form-group">
                <label >Foto</label>
                <input name="imagen" type="file" class="form-control"   >
                <small>Imagen anterior: <?php echo $usuario->imagen ?></small>
            </div>
       

        <button type="submit" class="btn mt-2 text-dark w-100">Guardar cambios</button>
        </form>
    
</div>

       
       
       
       
       
       
       
       
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>