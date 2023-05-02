<?php 
session_start();
include_once('ds.php'); 

$email=trim($_POST['email']);
$contrasena=trim($_POST['password']); 
$sentencia=$bd->prepare("SELECT *FROM administrador WHERE email_admin=? AND contrasena=?;");
$condicion=$sentencia->execute([$email,$contrasena]);
$verifique= $sentencia->fetch(PDO::FETCH_OBJ);

 
if($verifique===FALSE){
     
    header('Location:index.php');
 }
 

 else if($sentencia->rowCount()==1){ 
   $_SESSION['email'] =$verifique->email_admin;
   header('Location:home.php'); 
  
 }
 ?>



   





















    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>