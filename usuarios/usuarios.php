<?php 
require('ds.php');
include('header.php');
    $sentencia=$bd->query("SELECT *FROM usuario where estado='activo'");
    $usuarios=$sentencia->fetchALL(PDO::FETCH_OBJ);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="estiloUsuario.css">
   
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&family=Roboto:wght@100&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/20a61cc948.js" crossorigin="anonymous"></script>
    <title>Usuarios</title>

</head>

<body>

<h2 class="text-dark text-center mt-5">Usuarios</h2>
<hr>
<!--Modal agregar Usuario-->
<div id="FormularioUsuarios" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuevo Usuario</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     

        <form action="guardarUsuario.php" method="POST" enctype="multipart/form-data">
        <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nro. de Documento *</label>
                    <input name="idUsuario" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">Ingrese un número de documento válido.</small>
            </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Tipo de documento *</label>
                        <select name="tipoDocumento" class="form-control" id="exampleFormControlSelect2">
                            <option value="Cédula de ciudadania">...</option>
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
                        <input name="direccion" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>

                <div class="col-md-6">
                           
                    <div class="form-group">
                        <label for="exampleInputEmail1">Telefono *</label>
                        <input name="telefono" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>
                </div>
          </div>
          
          <div class="form-group">
                <label for="exampleInput1">Email *</label>
                <input name="email" type="text" class="form-control" id="exampleInput1" placeholder="">
                <small id="emailHelp" class="form-text text-muted">Ingrese un correo válido</small>
            </div>
            
            <div class="form-group">
                <label for="exampleInput1">Cargo *</label>
                <input name="cargo" type="text" class="form-control" id="exampleInput1" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInput1">Usuario *</label>
                <input name="login" type="text" class="form-control" id="exampleInput1" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleInput1">Contraseña *</label>
                <input name="clave" type="text" class="form-control" id="exampleInput1" placeholder="">
            </div>
            <div class="form-group">
                <label >Foto</label>
                <input name="imagen"  type="file" class="form-control"   >
            </div>

        

     
        </div>
       <div class="modal-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal agregar Usuario-->



<div class="container-fluid ml-2 mt-5">
    <button id="BtnAgregar" class="btn " data-bs-toggle="modal" data-bs-target="#FormularioUsuarios">Agregar Usuario  <i class="fa-solid fa-user-plus"></i></i></button>


    <div class="contenedort container-fluid w-100 ">


        <div class="containertabla">
         
            <table class="table">
                <tr>
                  
                    <td scope="col">Nro Documento</td>
                    <td scope="col">tipo</td>
                    <td scope="col">Dirección</td>
                    <td scope="col">Telefono</td>
                    <td scope="col">Email</td>
                    <td scope="col">Cargo</td>
                    <td scope="col">usuario</td>
                    <td scope="col">clave</td>
                    <td scope="col">foto</td>
                    <td scope="col">Estado</td>
                    
                </tr>
              

            <?php 
            foreach($usuarios as $usuario){
              ?>  
              <tr>
                  <td ><?php echo $usuario->idUsuario ?></td>
                  <td ><?php echo $usuario->tipoDocumento ?></td>
                  <td ><?php echo $usuario->direccion ?></td>
                  <td ><?php echo $usuario->telefono ?></td>
                  <td ><?php echo $usuario->email?></td>
                  <td ><?php echo $usuario->cargo ?></td>
                  <td ><?php echo $usuario->loginusr?></td>
                  <td ><?php echo $usuario->clave ?></td>
                  <td ><img id="fotos"  class="fotos" src="./files/<?php echo $usuario->imagen ?>" alt="img"> </td>
                  <td ><?php echo $usuario->estado ?></td>
                  <td ><a href="preactualizarUsuario.php?id=<?php echo $usuario->idUsuario; ?>"><button class="btn "><i class="fa-regular fa-pen-to-square"></i></button></a></td>
                  <td><a href="eliminarusuario.php?id=<?php echo $usuario->idUsuario; ?>"><button class="btn "><i class="fa-solid fa-trash"></i></button></a></td>
                  
              
              </tr>
         
              
              <?php
              
            }
            ?>
            </table>
        </div>
    </div>
</div>
</body>

</html>