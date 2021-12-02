<!---------------Vista Usuario------------------->


<!--------------Llamada a clase-------------------->

<?php
include 'php/ABMUsuario.php';
$usu = new Usuarios();
$dao = new ABMUsuario();

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


    <!---------------Validacion de acceso autorizado------------------->

            <?php
include_once 'php/header.php';

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
<!--------------Select y filtrado------------------->

    <div align="center" >
        <h4>Registro de Usuarios</h4><hr>
                <br>
            <div class="form-inline" style="position: relative; margin: auto; width: 600px;">
                <form method="POST" action="#" name="busqueda" align="center">
                    <input type="text" name="txtBusqueda" value="" size="10" placeholder="Buscar...?"
                           class="form-control" style="width: 250px;">
                    Buscar por:
                    <select class="form-control" name="txtCriterio" style="width: 200px;">
                        <option value="usr_alias">Alias </option>
                        <option value="usr_nombre">Nombre </option>
                        <option value="usr_tipo">Tipo </option>
                         <option value="usr_estado">Estado </option>
                         <option value="usr_correo">Correo </option>
                    </select><br><br>
                    <input type="submit" value="Buscar" name="btnBuscar" class="btn btn-outline-dark my-2 my-sm-0"/>
                    <input type="submit" value="Limpiar" name="btnreset" class="btn btn-outline-dark my-2 my-sm-0"/>
                    <hr>
                </form>
            </div>

            <!---------------Creacion de tabla------------------->


            <?php if (isset($_SESSION['tablaUsuarios'])) {
    echo "No hay datos para mostrar";
    echo "<br><br><br><br>";
    unset($_SESSION['tablaUsuarios']);
} else {

    ?>
        <div align="center" style="position: relative; margin: auto; width: 80%;">


    <?php

    if (isset($_REQUEST["btnGuardar"])) {
        $usu->setCorreo($_REQUEST["txtCorreo"]);
        $usu->setAlias($_REQUEST["txtAlias"]);
        $usu->setNombre($_REQUEST["txtNombre"]);
        $usu->setTipo($_REQUEST["txtTipo"]);
        $usu->setEstado($_REQUEST["txtEstado"]);
        $usu->setCorreo($_REQUEST["txtCorreo"]);
        $dao->insertar($usu);
        //$DBImagen->uploadImage($_FILES);
        echo $dao->getTabla();

    } elseif (isset($_REQUEST["btnEliminar"])) {
        $codigo = $_REQUEST["txtCodigo"];
        $dao->eliminar($codigo);
        echo $dao->getTabla();
    } elseif (isset($_REQUEST["btnModificar"])) {
        $codigo = $_REQUEST["txtCodigo"];
        $correo = $_REQUEST["txtCorreo"];
        $alias  = $_REQUEST["txtAlias"];
        $nombre = $_REQUEST["txtNombre"];
        $tipo   = $_REQUEST["txtTipo"];
        $estado = $_REQUEST["txtEstado"];
        $dao->modificar($codigo, $alias, $nombre, $tipo, $estado, $correo);
        //$DBImagen->uploadImage($_FILES);
        echo $dao->getTabla();
    } elseif (isset($_REQUEST["btnBuscar"])) {
        echo $dao->getFiltro($_REQUEST["txtBusqueda"], $_REQUEST["txtCriterio"]);
    } else {
        echo $dao->getTabla();

    }

    ?>


              <?php

    if (isset($_REQUEST["btnBuscar"])) {
        $paginasFiltro = new ABMUsuario;
        for ($page = 1; $page <= $paginasFiltro->getPagesFiltro($_REQUEST["txtBusqueda"], $_REQUEST["txtCriterio"]); $page++) {
            echo '<a style="margin-left:20px"  class="btn btn-dark" href = "vistaUsuario.php?page=' . $page . '">' . $page . ' </a>';
        }
    } else {
        $paginas = new ABMUsuario;
        for ($page = 1; $page <= $paginas->getPages(); $page++) {
            echo '<a style="margin-left:20px"  class="btn btn-dark" href = "vistaUsuario.php?page=' . $page . '">' . $page . ' </a>';
        }

    }

    ?>

    <br>

    <br>

    <?php }?>
<hr>

<!--------------ABM usuarios-------------------->

<h6>Gestion de usuarios</h6>

    </div>
        <div class="form-group" style="position: relative; margin: auto; width: 500px;" >
            <form method="POST" action="#" name="formulario" class="container" enctype="multipart/form-data">
                <div align="left">
                    <input type="text" hidden name="txtCodigo"value="" size="30" placeholder="Mail"
                       class="form-control"/>


                Correo: <div class="input-group">
                    <input  type="text" readonly type="email" name="txtCorreo" id="txtCorreo" value="" size="30" placeholder="Mail"
                       class="form-control"/>
                        <input  style="width:20px; align-self: center;" name="chkCorreo" id="chkCorreo" type="checkbox" onclick="habilitarMail()"><a style="align-self: center;font-size: 14px;">Cambiar</a>
                       </div>

                       <!--<input readonly type="text" name="txtCodigo"value="" size="30" placeholder="Codigo"
                       class="form-control"/> -->
                 Alias:<input type="text" name="txtAlias" value="" size="30" placeholder="Alias"
                       class="form-control"/>
                 Nombre:<input type="text"  name="txtNombre" value="" size="30" placeholder="Nombre"
                       class="form-control"/>
                 Tipo:<input type="text" name="txtTipo" value="" size="30" placeholder="Tipo de usuario"
                       class="form-control"/>
                 Estado:<input type="text" name="txtEstado" value="" size="30" placeholder="Estado"
                       class="form-control"/>
                 <br>

                 <div style="text-align: center">
                 <input type="submit" value="Agregar" name="btnGuardar" class="btn btn-outline-dark my-2 my-sm-0" onclick="return Agregar()"/>
                 <input type="submit" value="Eliminar" name="btnEliminar" class="btn btn-outline-dark my-2 my-sm-0" onclick="return Eliminar()"/>
                 <input type="submit" value="Modificar" name="btnModificar" class="btn btn-outline-dark my-2 my-sm-0" onclick="return Modificar()"/>
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
    function cargar(cod,alias,nom,tipo,estado,correo){
        document.formulario.txtCodigo.value=cod;
        document.formulario.txtCorreo.value=correo;
        document.formulario.txtAlias.value=alias;
        document.formulario.txtNombre.value=nom;
        document.formulario.txtTipo.value=tipo;
        document.formulario.txtEstado.value=estado;

        document.getElementById('txtCorreo').scrollIntoView({ behavior: 'smooth', block: 'center' })

    }


        $(document).ready(function () {
            $("#chkCorreo").change(function () {
                if ($(this).is(":checked")) {
                    $('#txtCorreo').removeAttr("readonly")
                }
                else {
                    $('#txtCorreo').attr('readonly', true);
                }
            });
        });


    </script>



<br><br>


</body>



<hr>
 <footer class="bg-dark" style="background: black">
    <p class="float-right"><a class="text-light" href="#" ><img style="width: 50%" src="images/icons/flecha-arriba.png" ></a></p>
    <p align="center" style="color:white">EDI 2019 - Copyright 2019®</p>
  </footer>

</html>
