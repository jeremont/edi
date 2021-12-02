<!-----------------miCarrito-------------------->




<!--------------Check de usuario-------------------->
<?php
include 'php/conexion.php';


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
    header("Location: php/accesoAutorizado.php");
}
$mail          = $_SESSION['mail'];
$selectUsuario = $con->prepare("select usr_id from tb_usuarios where usr_correo = '$mail'");

if ($selectUsuario->execute()) {
    $resultado = $selectUsuario->fetchAll();

    foreach ($resultado as $fila):
        $idUsuario = $fila['usr_id'];
    endforeach;
}

$sentencia_carrito = $con->prepare("SELECT pr.nombre_prod, pr.precio_unit, pe.cantidad, pe.codigo FROM producto pr, pedidos pe
  WHERE pe.idUsuario='$idUsuario' AND pe.estado='Pendiente' AND pe.idProducto = pr.codigo and pe.codigo like '%U$idUsuario\P%'");

$sentencia_carrito->execute();
$resultadoCarrito = $sentencia_carrito->fetchAll();

$cantidadRows = $sentencia_carrito->rowCount();

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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sweetalert2.css">

    <script src="js/jquery-3.3.1.slim.min.js"></script>
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

<!----------------Build de carrito-------------------->

<form method="POST">
    <div class="container marketing">
    <div class="row featurette">
    <div class="col-md-7">
      <br><br><br>
      <h2 class="featurette-heading">Tu pedido: </h2>
      <br>
      <ul>
        <?php

$total = 0;

foreach ($resultadoCarrito as $fila):
    $subtotal = $fila['precio_unit'] * $fila['cantidad'];
    $total    = $total + $subtotal;
    ?>
                <li>

              <h4><span name="lblNombre" class="text-muted"><?php echo $fila['nombre_prod']; ?><button name="btnEliminar" type="button" title="Quitar" style="background-color: white; border-color: white;margin-left: 25px;border: none;"  onclick="javascript:eliminarDato('<?php echo $fila['codigo']; ?>','<?php echo $fila['cantidad']; ?>')"><i  class="fas fa-trash"></i></button></span></h4>
              <br>
              <p name="lblPrecio" class="lead">Precio: $<?php echo $fila['precio_unit']; ?></p>
              <p name="lblCantidad" class="lead">Cantidad: <?php echo $fila['cantidad']; ?></p>
              <p name="lblSubtotal" class="lead"><b>Subtotal: $<?php echo $subtotal; ?></b></p>

              <br>
        </li>
              <?php endforeach?>
</ul>
    </div>

    </div>
    </div>

    <div class="container marketing">
    <div class="row featurette">
    <div class="col-md-7">
      <?php if (isset($_SESSION['carrito']) || !$cantidadRows == 0) {
    // code...

    ?>
             <hr style="width:500px; margin-left:0px;">

        <h2 name="lblTotal" class="featurette-heading"><i>Total: $<?php echo $total; ?></i></h2>
        <?php

} else {

    echo "No hay pedidos disponibles";
}
?>
    </div>

    </div>
    </div>


<!----------------Llamadas a funciones en carrito.php------------------------->


   <?php

include "php/carrito.php";

if (isset($_POST['btnEnviarPedido'])) {

    enviarPedido($_SESSION['mail'], $total);
}

if (isset($_POST['btnConfirmarEliminar'])) {
    $cod   = $_POST['lblCodigo'];
    $stock = $_POST['lblStock'];
    reponerStock($cod, $stock);
    eliminarRegistro($cod);

}

if (isset($_POST['btnVaciarCarrito'])) {

    vaciarCarrito($_SESSION['mail']);
}

?>
<br><br>

<!----------------Validacion de elementos agregados----------------------->
    <div class="container marketing">
    <div class="row featurette">
    <div class="col-md-7">
       <form  style="width: 80%" class="form-horizontal" role="form" action="" method="POST">
          <div id="botones" class="container" align="center">

                  <?php if (isset($_SESSION['carrito']) || !$cantidadRows == 0) {
    ?>
                       <button  class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btnEnviarPedido" onclick="return Confirmar('Enviar');">Enviar pedido</button>
            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btnVaciarCarrito" onclick="return Confirmar('Vaciar');">Vaciar carrito</button>
        <?php

} else {

    echo "";
}
?>

          </div>

      </div>
  </div></div>
          </form>

  <br>

    <br>

    <script>
      function Exito(){
        swal({title:'Exito',text:'El registro fue insertado satisfactoriamente',type:'success'});
      }

      function Confirmar(accion) {
        if (accion == 'Enviar') {
          var consulta = "Confirma que desea enviar el pedido?";
        }

         if (accion == 'Vaciar') {
          var consulta = "Confirma que desea vaciar el carrito?";
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



  </body>


  <footer style="margin-top: 100px;" class="bg-dark" style="background: black">
    <p class="float-right"><a class="text-light" href="#" ><img style="width: 50%" src="images/icons/flecha-arriba.png" ></a></p>
    <p align="center" style="color:white">EDI 2019 - Copyright 2019®</p>
  </footer>

</html>