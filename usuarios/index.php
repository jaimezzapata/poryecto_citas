<?php 
session_start();
if(isset($_SESSION['email'])){
  header('Location:home.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>logIn</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="estiloindex.css">
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ce5a622a17.js" crossorigin="anonymous"></script>

  </head>
  <body>
  
    <h1 class="mt-5 mb-5 text-center text-dark">Bienvenido a Zeta PC</h1>
    <br>
    <h3 class="text-center text-dark">Introduzca sus datos para iniciar sesión</h3>
    
    <div class="containerForm mt-5">
    <form class=" text-light colorform" action="login.php" method="POST">
        <label for="" >Email</label>
        <br>
        <input name="email" class="imgemail" type="text" placeholder="Email" >
        <br>
        <label for="">Password</label>
        <br>
        <input name="password" class="imgpassword" type="password" placeholder="Password">
        <br>
        <input  class="mt-5 botonlog" type="submit" value="Submit">

    </form>

    </div>











    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  </body>
</html>