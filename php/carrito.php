<?php
function agregarItems($correo, $idProducto, $cantidad)
{
    include 'php/conexion.php';

    $idUsuario = getIDUsuario($correo);

    $selectIDVenta = $con->prepare("select idVenta from pedidos order by idVenta DESC LIMIT 1");

    if ($selectIDVenta->execute()) {
        $resultado = $selectIDVenta->fetchAll();

        foreach ($resultado as $fila):
            $idVenta = $fila['idVenta'];
        endforeach;
    }

    $idVenta = $idVenta + 1;

    $codigo = "V" . $idVenta . "U" . $idUsuario . "P" . $idProducto;

    $insertVentas = $con->prepare("INSERT INTO pedidos (codigo, idUsuario, idProducto, cantidad, estado) VALUES ('$codigo','$idUsuario','$idProducto','$cantidad','Pendiente')");

    //$insertVentas->execute();

    if ($insertVentas->execute()) {
        $_SESSION['carrito'] = true;
        echo "<script>swal({title:'Exito',showConfirmButton: false, text:'Pedido agregado al carrito.',type:'success', html:'<h5>Pedido agregado al carrito</h5><br><a href=\"miCarrito.php\"><input type=\"submit\" name=\"agregarCarrito\" style=\"background-color: #343A40; color:white; width: 160px; height: 50px;\" value=\"Ir al carrito\"></a><br><br><a style=\"color:black;\" href=\"pedidos.php\">Seguir comprando</a><br><br>'});</script>";

    } else {
        echo "<script>swal({title:'Error',text:'Error al agregar el pedido al carrito.',type:'error'});</script>";
    }

    //$resultado=$insertVentas->fetchAll();

}

function getIDUsuario($mail)
{

    include 'php/conexion.php';

    $selectUsuario = $con->prepare("select usr_id from tb_usuarios where usr_correo = '$mail'");

    if ($selectUsuario->execute()) {
        $resultado = $selectUsuario->fetchAll();

        foreach ($resultado as $fila):
            $idUsuario = $fila['usr_id'];
        endforeach;

        return $idUsuario;
    } else {
        return '';
    }

}

function checkCarrito($mail)
{

    include 'php/conexion.php';

    $selectUsuario = $con->prepare("select usr_id from tb_usuarios where usr_correo = '$mail'");

    if ($selectUsuario->execute()) {
        $resultado = $selectUsuario->fetchAll();

        foreach ($resultado as $fila):
            $idUsuario = $fila['usr_id'];
        endforeach;
    }

    $selectPedido = $con->prepare("select * from pedidos where idUsuario = '$idUsuario' and estado = 'Pendiente'");

//$sql = "select * from pedidos where idUsuario = $idUsuario and estado = Pendiente";

    if ($selectPedido->execute()) {
        $resultado = $selectPedido->rowCount();

        if ($resultado != 0) {
            return true;

        } else {

            return false;

        }
    }

}

function eliminarRegistro($codigo)
{
    include 'php/conexion.php';

    $eliminarDato = $con->prepare("DELETE FROM pedidos WHERE codigo='$codigo'");

    if ($eliminarDato->execute()) {
        //$_SESSION['carrito'] = true;
        echo "<script>swal({title:'',showConfirmButton: false, text:'Item eliminado.',type:'success', html:'<h3>Item eliminado.</h3><br><br><a href=\"miCarrito.php\"><input type=\"submit\" hidden value=\"Ir al carrito\"></a><a style=\"color:black;\" href=\"miCarrito.php\">Continuar</a><br><br>'});</script>";

    }
    unset($_SESSION['carrito']);
}

function vaciarCarrito($correo)
{
    include 'php/conexion.php';

    $idUsuario = getIDUsuario($correo);

    $eliminarCarrito = $con->prepare("DELETE FROM pedidos WHERE idUsuario='$idUsuario' AND estado='Pendiente'");

    if ($eliminarCarrito->execute()) {
        unset($_SESSION['carrito']);
        echo "<script>swal({title:'',showConfirmButton: false, text:'Carrito vaciado.',type:'success', html:'<h3>Carrito vaciado.</h3><br><br><a href=\"miCarrito.php\"><input type=\"submit\" hidden value=\"Ir a pedidos\"></a><a style=\"color:black;\" href=\"pedidos.php\">Ir a pedidos</a><br><br>'});</script>";

    }

}

function enviarPedido($correo, $precio)
{
    include 'php/conexion.php';
    require_once "php/sendmail.php";

    $idUsuario = getIDUsuario($correo);

    $updateEstado = $con->prepare("UPDATE pedidos SET estado='Confirmado' where idUsuario='$idUsuario' AND estado='Pendiente' AND codigo LIKE '%U$idUsuario\P%'");

    if ($updateEstado->execute()) {
        unset($_SESSION['carrito']);
        enviarMailPedido($correo, $_SESSION['user'], $precio);

    }

}

function getStock($idProducto)
{

}

function updateStock($idProducto, $cantidad)
{
    include 'php/conexion.php';

    $stock = $con->prepare("UPDATE producto SET existencia= existencia-$cantidad where codigo='$idProducto'");

    $stock->execute();

}

function reponerStock($codigo, $stock)
{
    include 'php/conexion.php';

    $selectIDProducto = $con->prepare("select idProducto from pedidos where codigo = '$codigo'");

    if ($selectIDProducto->execute()) {
        $resultado = $selectIDProducto->fetchAll();

        foreach ($resultado as $fila):
            $idProducto = $fila['idProducto'];
        endforeach;
    }

    $aumentarStock = $con->prepare("UPDATE producto SET existencia= existencia+$stock where codigo='$idProducto'");

    $aumentarStock->execute();

}
