<?php 
require('ds.php');
include('../usuarios/header.php');
    $sentencia=$bd->query("SELECT *FROM usuariopermiso where estado='activo'");
    $permisos=$sentencia->fetchALL(PDO::FETCH_OBJ);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="estiloPermisos.css">
   
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@100&family=Roboto:wght@100&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/20a61cc948.js" crossorigin="anonymous"></script>
    <title>Permisos</title>

</head>

<body>

<h2 class="text-dark text-center mt-5">Usuario-Permiso</h2>
<hr>
<!--Modal agregar Usuario-->
<div id="FormularioUsuarioPermiso" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Añadir permiso a usuario</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     

        <form action="guardarUsuarioPermiso.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Id Permiso Usuario *</label>
                    <input name="idUsuarioPermiso" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
            </div>

            </div>
         
            <div class="form-group">
                    <label for="exampleInputEmail1">Id Permiso *</label>
                    <input name="idPermiso1" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted"></small>
             </div>

             <div class="form-group">
                    <label for="exampleInputEmail1">Id Usuario *</label>
                    <input name="idUsuario1" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                    <small id="emailHelp" class="form-text text-muted"></small>
             </div>

            

     
        </div>
       <div class="modal-footer">
        <button type="submit" class="btn">Guardar</button>
        </form>
        <button type="button" class="btn" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal agregar Usuario-->



<div class="container-fluid ml-2 mt-5">
    <button id="BtnAgregar" class="btn " data-bs-toggle="modal" data-bs-target="#FormularioUsuarioPermiso">Dar Permiso a un Usuario <i class="fa-solid fa-users"></i></button>


    <div class="contenedort container-fluid w-100 ">


        <div class="containertabla">
         
            <table class="table">
                <tr>
                    <td scope="col">Id Usuario-Permiso</td>
                    <td scope="col">Id Permiso</td>
                    <td scope="col">Nro Documento Usuario</td>
                    <td scope="col">Estado</td>
                   
                </tr>
              

            <?php 
            foreach($permisos as $usuario){
              ?>  
              <tr>
                  <td ><?php echo $usuario->idUsuarioPermiso ?></td>
                  <td ><?php echo $usuario->idPermiso1 ?></td>
                  <td ><?php echo $usuario->idUsuario1?></td>
                  <td><?php echo $usuario->estado?></td>
                
                 
                  <td ><a href="preactualizarUsuarioPermiso.php?id=<?php echo $usuario->idUsuarioPermiso; ?>"><button class="btn "><i class="fa-regular fa-pen-to-square"></i></button></a></td>
                  <td><a href="eliminarUsuarioPermiso.php?id=<?php echo $usuario->idUsuarioPermiso; ?>"><button class="btn "><i class="fa-solid fa-trash"></i></button></a></td>
                  
              
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