<!---------------Cuenta------------------->


<?php
include 'php/conexion.php';

if (isset($_SESSION['mail'])) {
    $mail = $_SESSION['mail'];

}

?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <!-------------Verificar acceso--------------------->

            <?php
include_once 'php/header.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($pid)) {

} else {
    header("Location: php/accesoAutorizado.php");
}
?>



<!------------Creacion de form--------------->

<form method="POST">
    <div class="container marketing">
    <div class="row featurette">
    <div class="col-md-7">
      <br><br><br>
      <h2 class="featurette-heading">Tus datos personales: </h2>
        <?php
if (isset($_SESSION['mail'])) {

    $selectUsuario = $con->prepare("select * from tb_usuarios where usr_correo = '$mail'");
    if ($selectUsuario->execute()) {
        $resultado = $selectUsuario->fetchAll();

        foreach ($resultado as $fila):

        ?>

      <br>
      <p name="" class="lead">Correo: </p> <input style="width:250px;"readonly disabled  type="text" name="" value="<?php echo $fila['usr_correo']; ?>">
      <br><br>
      <p name="" class="lead">Nombre: </p> <input style="width:250px;"type="text" name="usr_nombre" value="<?php echo $fila['usr_nombre']; ?>">
      <br><br>
      <p name="" class="lead">Apellido: </p><input style="width:250px;"type="text" name="usr_apellido" value="<?php echo $fila['usr_apellido']; ?>">
      <br><br>
      <p name="" class="lead">Direccion: </p><input style="width:250px;"type="text" name="usr_direccion" value="<?php echo $fila['usr_direccion']; ?>">
      <br>
      <br>
      <?php
endforeach;
    }
}
?><br>
             <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btnCambiarDatos" onclick="return Confirmar('Datos');">Cambiar datos</button>

    </div>

    </div>
    </div>

              </form>

          <br><br>
 <form method="POST">

    <div class="container marketing">
    <div class="row featurette">
    <div class="col-md-7">
      <?php
// code...

?>

<!-----------Form contraseña--------------->

             <hr style="width:500px; margin-left:0px;">

        <h2 name="lblTotal" class="featurette-heading">Cambio contraseña:</h2>
              <br>

      <p name="lblSubtotal" class="lead">Contraseña actual: </p><input required style="width:250px;" type="password" name="pwd" id="pwd" placeholder="Ingrese su contraseña actual"><input type="checkbox" style="margin-left: 10px;" onclick='mostrarPwd("Actual")'> Mostrar
      <br><br>
      <p name="lblSubtotal"  class="lead">Contraseña nueva: </p><input minlength = "6" maxlength = "20" required style="width:250px;"type="password" name="pwdNueva" id="pwdNueva" placeholder="Ingrese su nueva contraseña"><input   type="checkbox" style="margin-left: 10px;" onclick='mostrarPwd("Nueva")'> Mostrar
      <br><br>
      <p name="lblSubtotal" class="lead">Reingresar contraseña nueva: </p><input  minlength = "6" maxlength = "20" required style="width:250px;"type="password" name="pwdNueva2" id="pwdNueva2" placeholder="Reingrese su nueva contraseña"><input   type="checkbox" style="margin-left: 10px;"onclick='mostrarPwd("Nueva2")'> Mostrar
      <br>
      <br>
        <?php

?><br>
       <button  class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btnCambiarPwd" onclick="return Confirmar('Pwd');">Cambiar contraseña</button>

    </div>

    </div>
    </div>

              </form>

<!------------Llamadas a funciones--------------->

   <?php

include "php/datosCuenta.php";

if (isset($_POST['btnCambiarDatos'])) {

    cambiarDatosUsuario($_SESSION['mail'], $_POST['usr_nombre'], $_POST['usr_apellido'], $_POST['usr_direccion']);

}

if (isset($_POST['btnCambiarPwd'])) {

    cambiarPwdusuario($_SESSION['mail'], $_POST['pwd'], $_POST['pwdNueva'], $_POST['pwdNueva2']);
}

?>
<br><br>
    <div class="container marketing">
    <div class="row featurette">
    <div class="col-md-7">
       <form  style="width: 80%" class="form-horizontal" role="form" action="" method="POST">
          <div id="botones" class="container" align="center">

          </div>

      </div>
  </div></div>

  <br>

    <br>

    <script>
      function Exito(){
        swal({title:'Exito',text:'El registro fue insertado satisfactoriamente',type:'success'});
      }

      function Confirmar(accion) {
        if (accion == 'Datos') {
          var consulta = "Confirma que desea cambiar sus datos?";
        }

         if (accion == 'Pwd') {
          var consulta = "Confirma que desea cambiar su contraseña?";
        }

        var usr = confirm(consulta);
        if (usr == true) {
          return true;
        }
        return false;
      }

      function eliminarDato(codigo, stock) {
swal({
    title:"",
    type:"question",
    text:"¿Deseas eliminar este elemento del pedido?",
    imageWidth: 400,
    html:'<form method="POST" style="height:50%;"><br><h3 style="text-align: center;">¿Deseas eliminar este elemento del pedido?</h3><br><div></h5></div><input hidden type="text" name="lblCodigo" value="'+codigo+'"><input hidden type="text" name="lblStock" value="'+stock+'"><br> <div> <input type="submit" style="background-color: #343A40; color:white; width: 160px; height: 50px;" name="btnConfirmarEliminar" value="Confirmar"><br></div><br><br></form>',
   showCancelButton: false,
      showConfirmButton: false,

    cancelButtonColor: "gray",
    confirmButtonColor: "#495F91",

    width: 500,
    padding: "3em"

});
      }

    </script>

<script type="text/javascript">

  function mostrarPwd(tipo) {

if (tipo=="Actual") {
  var x = document.getElementById("pwd");
}

  if (tipo=="Nueva") {
  var x = document.getElementById("pwdNueva");
}

if (tipo=="Nueva2") {
  var x = document.getElementById("pwdNueva2");
}

  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }


}

    </script>


  </body>


  <footer style="margin-top: 100px;" class="bg-dark" style="background: black">
    <p class="float-right"><a class="text-light" href="#" ><img style="width: 50%" src="images/icons/flecha-arriba.png" ></a></p>
    <p align="center" style="color:white">EDI 2019 - Copyright 2019®</p>
  </footer>

</html>