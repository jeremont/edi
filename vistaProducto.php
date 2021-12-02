
<!------------------vistaProducto---------------------->

<?php

include 'php/ABMProducto.php';
$prod = new Producto();
$dao  = new DAOProducto();

$adm = '1';

?>

<?php
include_once 'php/conexion.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <script src="js/bootstrap.js"></script>
    <script src="js/sweetalert2.js"></script>


    <script src="js/jquery.js"></script>


</head>
<body>


<!------------------Verificar acceso autorizado--------------------->
            <?php
include 'php/header.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($pid != 3) {
        header("Location: php/accesoAutorizado.php");

    }
} else {
    header("Location: php/accesoAutorizado.php");
}

?>

<br>
<br>
<br>
<hr>

<!---------------Busqueda y filtro-------------------->
    <div align="center" >
        <h4>Registro de Productos</h4><hr>
                <br>
            <div class="form-inline" style="position: relative; margin: auto; width: 600px;">
                <form method="POST" action="#" name="busqueda" align="center">
                    <input type="text" name="txtBusqueda" value="" size="10" placeholder="Buscar...?"
                           class="form-control" style="width: 250px;">
                    Buscar por:
                    <select class="form-control" name="txtCriterio" style="width: 200px;">
                        <option value="codigo">Codigo </option>
                        <option value="nombre_prod">Nombre de Producto </option>
                        <option value="descripcion">Descripcion </option>
                         <option value="precio_unit">Precio Unitario $ </option>
                         <option value="existencia">Cantidad </option>
                    </select><br><br>
                    <input type="submit" value="Buscar" name="btnBuscar" class="btn btn-outline-dark my-2 my-sm-0"/>
                    <input type="submit" value="Limpiar" name="btnreset" class="btn btn-outline-dark my-2 my-sm-0"/>
                    <hr>
                </form>

            </div>



<!--------------Creacion de tabla productos------------------->

                <?php if (isset($_SESSION['tablaProductos'])) {
    echo "No hay datos para mostrar";
    echo "<br><br><br><br>";
    unset($_SESSION['tablaProductos']);
} else {

    ?>
        <div align="center" style="position: relative; margin: auto; width: 80%;">


    <?php

    if (isset($_REQUEST["btnGuardar"])) {
        $prod->setCodigo($_REQUEST["txtCodigo"]);
        $prod->setNombreProducto($_REQUEST["txtNombre"]);
        $prod->setDescripcion($_REQUEST["txtDescripcion"]);
        $prod->setPrecioUnit($_REQUEST["txtPrecio"]);
        $prod->setExistencia($_REQUEST["txtExistencia"]);
        $DBImagen->uploadImage($_FILES);
        $dao->insertar($prod);
        echo $dao->getTabla();

    } elseif (isset($_REQUEST["btnEliminar"])) {
        $codigo = $_REQUEST["txtCodigo"];
        $dao->eliminar($codigo);
        echo $dao->getTabla();
    } elseif (isset($_REQUEST["btnModificar"])) {
        $codigo      = $_REQUEST["txtCodigo"];
        $nombre      = $_REQUEST["txtNombre"];
        $descripcion = $_REQUEST["txtDescripcion"];
        $precio      = $_REQUEST["txtPrecio"];
        $existencia  = $_REQUEST["txtExistencia"];
        $DBImagen->uploadImage($_FILES);
        $dao->modificar($codigo, $nombre, $descripcion, $precio, $existencia);
        echo $dao->getTabla();
    } elseif (isset($_REQUEST["btnBuscar"])) {
        echo $dao->getFiltro($_REQUEST["txtBusqueda"], $_REQUEST["txtCriterio"]);
    } else {
        echo $dao->getTabla();

    }

    ?>


              <?php

    if (isset($_REQUEST["btnBuscar"])) {
        $paginasFiltro = new DAOProducto;
        for ($page = 1; $page <= $paginasFiltro->getPagesFiltro($_REQUEST["txtBusqueda"], $_REQUEST["txtCriterio"]); $page++) {
            echo '<a style="margin-left:20px"  class="btn btn-dark" href = "vistaProducto.php?page=' . $page . '">' . $page . ' </a>';
        }
    } else {

        //include 'php/pages.php';
        $paginas = new DAOProducto;
        for ($page = 1; $page <= $paginas->getPages(); $page++) {
            echo '<a style="margin-left:20px"  class="btn btn-dark" href = "vistaProducto.php?page=' . $page . '">' . $page . ' </a>';
        }
    }

    ?>

    <br>


    <br>
<?php }?>
<hr>

<!-----------------ABM productos-------------------->

<h6 name="gestionProducto">Gestion de productos</h6>

    </div>
        <div class="form-group" style="position: relative; margin: auto; width: 550px;" >
            <form method="POST" action="#" name="formulario" class="container" enctype="multipart/form-data">
                <div align="left">
                Codigo:<input type="text" name="txtCodigo" id="txtCodigo" value="" size="30" readonly placeholder="Auto-generado"
                       class="form-control"/>
                       <!--<input readonly type="text" name="txtCodigo"value="" size="30" placeholder="Codigo"
                       class="form-control"/> -->
                 Producto:<input type="text" name="txtNombre" value="" size="30" placeholder="Nombre de producto"
                       class="form-control"/>
                 Precio:<input type="number" name="txtPrecio" value="" size="30" placeholder="Precio unitario"
                       class="form-control"/>
                 Cantidad:<input type="number" name="txtExistencia" value="" size="30" placeholder="Cantidad a ingresar"
                       class="form-control"/>
                       Descripcion:<textarea style="height: 100px;" maxlength="1000" name="txtDescripcion" value="" size="30" placeholder="Descripcion del producto"
                       class="form-control"/></textarea>
                 <br>
                                 <font size="2">Ingrese una Imagen: <input align="center"type="file" name="imagen"></font>
                  <br>
                  <br>
                <!--<input type="submit" value="Subir imagen" name="imagenPrueba" class="btn btn-sm btn-outline-dark">-->
                 <div style="text-align: center">
                 <input type="submit" value="Agregar producto" name="btnGuardar" id="btnGuardar" class="btn btn-outline-dark my-2 my-sm-0" onclick="return Agregar()"/>
                 <input type="submit" value="Eliminar producto" name="btnEliminar" class="btn btn-outline-dark my-2 my-sm-0" onclick="return Eliminar()"/>
                 <input type="submit" value="Modificar producto" name="btnModificar" class="btn btn-outline-dark my-2 my-sm-0" onclick="return Modificar()"/>
                </div>

                </div>



   </form>


        </div>


    </div>



        <script>

function Eliminar() {
    var usr = confirm("Confirma que desea eliminar este registro?");
    if (usr == true) {
        return true;
    }
    return false;
}
function Modificar() {
    var usr = confirm("Confirma que desea modificar este registro?");
    if (usr == true) {
        return true;
    }
    return false;
}

function Agregar() {
    var usr = confirm("Confirma que desea agregar este registro?");
    if (usr == true) {
        return true;
    }
    return false;
}

    </script>


    <script>
    function cargar(cod,nom,desc,pu,ex){

        document.formulario.txtCodigo.value=cod;
        document.formulario.txtNombre.value=nom;
        document.formulario.txtDescripcion.value=desc;
        document.formulario.txtExistencia.value=ex;
        document.formulario.txtPrecio.value=pu;
        document.getElementById('txtCodigo').scrollIntoView({ behavior: 'smooth', block: 'center' })


    }


    </script>

    <br><br>


</body>



<hr>
 <footer class="bg-dark" style="background: black">
    <p class="float-right"><a class="text-light" href="#" ><img style="width: 50%" src="images/icons/flecha-arriba.png" ></a></p>
    <p align="center" style="color:white">EDI 2019 - Copyright 2019®</p>
  </footer>

</html>

