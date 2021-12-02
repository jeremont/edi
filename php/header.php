<!--<header class="container">-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">

      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="/edi">MR. SANDWICH</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link" href="pedidos.php">Pedidos Online <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="contactos.php">Contactanos</a>
        </li>

        <?php

include 'php/isadmin.php';

if (isset($_SESSION['mail'])) {
    // code...

//include "carrito.php";
    $selectUsuario = $con->prepare("select usr_id from tb_usuarios where usr_correo = '" . $_SESSION['mail'] . "'");

    if ($selectUsuario->execute()) {
        $resultado = $selectUsuario->fetchAll();

        foreach ($resultado as $fila):
            $idUsuario = $fila['usr_id'];
        endforeach;
    }

    $selectPedido = $con->prepare("select * from pedidos where idUsuario = '$idUsuario' and estado = 'Pendiente'");

    if ($selectPedido->execute()) {
        $resultado = $selectPedido->rowCount();

        if ($resultado != 0) {
            $carrito = "<input value='' title='Ver pedidos' style='border: 0;outline: none; background-color:#343A40;' type='submit'><i title='Ver pedidos' style='color:#Fc0404; width:30px; margin-right:15px;' class=\"fas fa-cart-plus fa-lg\" ></i>";

        } else {

            $carrito = "<input value='' title='No hay pedidos' style='border: 0;outline: none; background-color:#343A40;' type='submit'><i title='No hay pedidos' style='color:#FFFFFF80; width:30px; margin-right:15px;' class=\"fas fa-shopping-cart fa-lg\" ></i>";

        }
    }

}

?>

      </ul>

      <form class="form-inline mt-2 mt-md-0">
         <div class="row" >
         <div class="col-md-12">
           <h6 style="margin-top:15px">
           <p style="color:white" align="center">
             <?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    echo "<a href='miCarrito.php'>$carrito</a>";

    echo "Bienvenido  $_SESSION[user]!    ";

    echo "<a style='margin-left:10px' href='php/logout.php'><FONT style='color: white' SIZE=2>Cerrar Sesión</FONT></a> </p>";
}
?>
            </h6>
          </div>
        </div>
        <div style="margin-left:20px">

        <?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
} else {
    echo "<button class='btn btn-outline-light my-2 my-sm-0'><font color='white'><a style= 'color: white' href='login.php'>Ingresar</a></font></button>";
}
?>

        </div>
      </form>
      </div>
      </nav>

      <?php

//if (!isset($adm) && !isset($_SESSION['carrito'])) {
if (!isset($adm)) {
    echo "<hr>
      <hr>
      <hr>
      <hr>

      <div class=\"container\">
      <div class=\"row\">
      <div class=\"col-md-12 text-center\">
        <a ><img id=\"logo\" class=\"logo\" name=\"logo\" align=\"center\"  src=\"images/icons/lema3.png\"></a>
      </div>
      </div>
      </div>

      <hr>";
}

?>

