<!------------------Pedidos----------------------->

<?php
include 'php/conexion.php';

$sentencia_select = $con->prepare('SELECT * FROM producto where existencia <> 0 ORDER BY codigo DESC');
$sentencia_select->execute();
$resultadoPedidos = $sentencia_select->fetchAll();

$listaProductos = $sentencia_select->rowCount();

?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Mr. Sandwich</title>


    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">
    <script src="js/jquery-3.3.1.slim.min.js"></script>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sweetalert2.css">

    <script src="js/bootstrap.js"></script>
        <script src="js/sweetalert2.js"></script>
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
include 'php/header.php';
?>


    <br>
    <?php
if ($listaProductos == 0) {
    echo '<h6 style="text-align: center;">No hay productos disponibles.</h6><br><br><br><br>';

} else {

    ?>

    <!-----------------Generacion de articulos--------------------->

    <?php ?>
    <section class="container">
      <br>
      <br>
      <div id="galeria" >
        <article text-aling="center" aling="center">
        <div  class="row" text-aling="center" >

        <?php foreach ($resultadoPedidos as $fila): ?>
          <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="10" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title>
          <?php
?>

          <img style="height: 250px"src="<?php echo $fila['imagen']; ?>"/>



          </svg>
          <div  class="card-body">
            <p class="card-text"><strong><?php echo $fila['nombre_prod']; ?> </strong><br><?php echo $fila['descripcion']; ?></p>
            <p hidden class="card-text"><?php echo $fila['codigo']; ?></p>
            <p hidden class="card-text"><?php echo $fila['existencia']; ?></p>
            <div class="d-flex justify-content-between align-items-center">
            <div align="left">

<!---------------Validacion de sesion iniciada--------------------->

              <?php
if (isset($_SESSION['mail'])) {

        /*if ($fila['existencia'] < 15) {

            $num = $fila['existencia'];
        } else {

            $num = 15;
        }*/

        ?>

              <button onclick="javascript:pedir('<?php echo $fila['codigo']; ?>', '<?php echo $fila['nombre_prod']; ?>', '<?php echo $fila['existencia']; ?>', '<?php echo $fila['precio_unit']; ?>', '<?php echo $fila['imagen']; ?>')" type="button" class="btn btn-sm btn-outline-dark">Pedir</button>

<?php } else {
        ?>

               <button onclick="javascript:swal({title:'',text:'Ingresa con tu cuenta para poder hacer un pedido', html:'<h5>Ingresa con tu cuenta para poder hacer un pedido</h5><br><a href=\'login.php\'><input type=\'submit\' name=\'agregarCarrito\' style=\'background-color: #343A40; color:white; width: 160px; height: 50px;\' value=\'Ingresar\'></a><br><br>', type:'info', showConfirmButton: false});" type="button" class="btn btn-sm btn-outline-dark">Pedir</button>
<?php }?>
            </div>
            <div class="w3-container w3-black">
              <p>Precio $ <?php echo $fila['precio_unit']; ?></p>
            </div>
            </div>
          </div>
          </div>
          </div>
        <?php endforeach?>
        </div>
        </article>
      </div>
    </section>

<?php }?>


<!---------------Cargar carrito--------------------->

  <?php
include "php/carrito.php";

if (isset($_POST['agregarCarrito'])) {
    agregarItems($_SESSION['mail'], $_POST['lblCodigo'], $_POST['selecCantidad']);

    updateStock($_POST['lblCodigo'], $_POST['selecCantidad']);

}

?>






    <script>
      function Eliminar() {
        var usr = confirm("Esta seguro que desea eliminar este producto?");
        if (usr == true) {
          return true;
        }
        return false;
      }

      function Editar() {
        var usr = confirm("Esta seguro que desea editar este producto?");
        if (usr == true) {
          return true;
        }
        return false;
      }

      function pedir(codigo, titulo, stock, precio, imagen) {



swal({
    title:titulo,
    text:"",
    imageUrl: imagen,
    imageWidth: 400,
    html:'<form method="POST" style="height:50%;"><br><h5 style="text-align: center;">Precio: $'+precio+' </h5><br><div>Cantidad: </h5><select name="selecCantidad"><option>1<?php for ($i = 2; $i <= 15; $i++) {?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php }?></option></select></div><input hidden type="text" name="lblCodigo" value="'+codigo+'"><br><br> <div> <input type="submit" style="background-color: #343A40; color:white; width: 160px; height: 50px;" name="agregarCarrito" value="Agregar al carrito"><br></div><br><br></form>',
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

  <hr>

  <footer class="bg-dark" style="background: black">
    <p class="float-right"><a class="text-light" href="#" ><img style="width: 50%" src="images/icons/flecha-arriba.png" ></a></p>
    <p align="center" style="color:white">EDI 2019 - Copyright 2019®</p>
  </footer>

</html>