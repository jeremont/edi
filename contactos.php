<?php
include_once 'php/conexion.php';

?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Mr. Sandwich</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">
    <link rel="stylesheet" type="text/css" href="css/mapa.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script src="js/jquery.js"></script>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>

  <body>
        <?php
include_once 'php/header.php';
?>

    <div class="container marketing">
      <br>
    <!--<hr class="featurette-divider">-->
    <div class="row featurette">
    <div class="col-md-7">
      <br>
      <h2 class="featurette-heading">Nuestro Local: <span class="text-muted">Av. Manuel Belgrano 1191</span></h2>
      <br>
      <p class="lead">Telefonos:</p>
      <p class="lead">(+54.11) 4265-0247 / 4265-0342 / 4203-0222 / 4203-0134</p>
      <p class="lead">Horarios: </p>
      <p class="lead" >Lunes a Viernes de 08 a 21 hs</p>
    </div>
    <div class="col-md-5">
      <br>
    <div  style="height:400px;" id="map">
    </div>
    </div>
    </div>
    </div>

    <br>
   <?php

include "php/sendmail.php";

if (isset($_POST['enviarConsulta'])) {
    $correo = $_POST['correo'];
    //$nacimiento=$_POST['nacimiento'];
    $consulta = $_POST['consulta'];

    if (empty($correo) /*|| empty($nacimiento)*/ || empty($consulta)) {
        echo "<script> alert('Los campos no pueden estar vacios');</script>";
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('Correo no valido');</script>";
    }

    if (!empty($correo) /*&& !empty($nacimiento)*/ && !empty($consulta) && (filter_var($correo, FILTER_VALIDATE_EMAIL))) {
        enviarMail();

    }
}
?>

  <section >

    <br>
    <div class="container marketing">
      <hr class="featurette-divider">
      <div class="row featurette">
      <div class="col-md-7">
        <br>
        <h2>Envie su consulta</h2>
        <br>
       <form  style="width: 80%" class="form-horizontal" role="form" action="" method="POST">
         <div class="form-group">
          </div>
          <div class="input-group margT25">
              <span class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
              </span>
              <input id="login-username"  type="email" class="form-control" name="correo" value="<?php if (isset($_SESSION['mail'])) {echo $_SESSION['mail'];}?>" placeholder="Ingrese su correo">
          </div>
          <br>
          <div style="text-align: left;">
            <label hidden for="userBorn" >Ingrese su naciminento</label>
          </div>
          <div class="input-group margT25">
            <span class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </span>
            <input id="login-username" type="date" class="form-control" name="nacimiento" value="" hidden placeholder="Ingrese su nacimineto">
          </div>
          <div style="text-align: left;">
            <!--<label for="userBorn">Ingrese su consulta</label>-->
          </div>

          <div class="input-group margT25" style="height: 120px;">
            <span class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </span>
            <textarea  id="login-username" type="text" class="form-control" name="consulta" value="" placeholder="Ingrese su consulta"></textarea>
          </div>

          <br>
          <div id="botones" class="container" align="center">
            <button  class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="enviarConsulta" onclick="return Confirmar();">Enviar Formulario</button>
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" ><a href="menu.php"></a>Resetear Formulario</button>
          </div>
        </form>
        <?php

?>
      </div>

      <div class="col-md-5">
        <br>
        <h2 style="text-align: center;">Nuestras redes sociales</h2>
        <br>
        <div class="row" align="center">
        <div class="col-md-12">
          <a class="col-md-3" href="#" ><img style="width: 25%" src="images/icons/facebook.png" ></a>
          <a class="col-md-3" href="#" ><img style="width: 25%" src="images/icons/instagram.png" ></a>
          <br>
          <br>
          <br>
          <a class="col-md-3" href="#" ><img style="width: 25%" src="images/icons/twitter.png" ></a>
          <a class="col-md-3" href="#" ><img style="width: 25%" src="images/icons/youtube.png" ></a>
        </div>
        </div>
      </div>
      </div>
    </div>
  </section>

  <br>
    <form action="" method="post"> <
    </form>
    <br>

    <script>
      function Exito(){
        swal({title:'Exito',text:'El registro fue insertado satisfactoriamente',type:'success'});
      }

      function Confirmar() {
        var usr = confirm("Confirma que desea enviar esta consulta?");
        if (usr == true) {
          return true;
        }
        return false;
      }
    </script>

    <script src="js/mapa.js">
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSMYSWosjdzAetSm6D_VmSH0soyK54l0U&callback=iniciarMap" >
    </script>

  </body>

  <hr>

  <footer class="bg-dark" style="background: black">
    <p class="float-right"><a class="text-light" href="#" ><img style="width: 50%" src="images/icons/flecha-arriba.png" ></a></p>
    <p align="center" style="color:white">EDI 2019 - Copyright 2019®</p>
  </footer>

</html>