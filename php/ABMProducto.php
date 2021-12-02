

            <link rel="stylesheet" href="css/estilo.css">



        <!--<link rel="stylesheet" href="css/style.css">-->

    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bs4.pop.js"></script>
    <link rel="stylesheet" href="css/bs4.pop.css">

<?php
include 'Producto.php';
include 'conexion.php';

class DAOProducto
{
    private $con;

    public function __construct()
    {

    }
    public function conectar()
    {
        try {
            $this->con = new mysqli(SERVIDOR, USUARIO, CONTRA, BD) or die("Error al conectar");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

    }
    public function desconectar()
    {
        $this->con->close();
    }

    public function getPages()
    {
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        //define total number of results you want per page
        $results_per_page = 5;

        $query = "select * from producto";
        $this->conectar();
        $res              = $this->con->query($query);
        $number_of_result = mysqli_num_rows($res);

        //determine the total number of pages available
        $number_of_page = ceil($number_of_result / $results_per_page);

        $this->desconectar();

        return $number_of_page;
    }

    public function getPagesFiltro($buscar, $criterio)
    {
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        //define total number of results you want per page
        $results_per_page = 5;

        $query = "select * from producto where $criterio like '%$buscar%'";
        $this->conectar();
        $res              = $this->con->query($query);
        $number_of_result = mysqli_num_rows($res);

        //determine the total number of pages available
        $number_of_page = ceil($number_of_result / $results_per_page);

        $this->desconectar();

        return $number_of_page;
    }

    public function getTabla()
    {

        //find the total number of results stored in the database
        $query = "select * from producto";
        $this->conectar();
        $res = $this->con->query($query);

        $datosTabla = mysqli_num_rows($res);

        if ($datosTabla == 0) {
            $_SESSION['tablaProductos'] = "Vacia";

        }

        //determine the total number of pages available

        $this->desconectar();

        //determine which page number visitor is currently on
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $results_per_page = 5;

        //determine the sql LIMIT starting number for the results on the displaying page
        $page_first_result = ($page - 1) * $results_per_page;
        //retrieve the selected results from database
        $query = "SELECT * FROM producto LIMIT " . $page_first_result . ',' . $results_per_page;

        $this->conectar();
        $res = $this->con->query($query);

        $this->desconectar();

        //ahora crearemos una tabla en bootstrap
        //los enlaces a los css y js estaran en las respectivas visatas
        $tabla = "<table class='table' style=\"border: 100px;\">"
            . "<thead class='thead-dark'>";

        $tabla .= "<tr style=\"text-align: center\">"
            . "<th>Codigo</th>"
            . "<th>Nombre</th>"
            . "<th>Descripcion</th>"
            . "<th>Precio</th>"
            . "<th>Cantidad</th>"
            . "<th>Ruta de imagen</th>"
            . "<th>Imagen</th>"
            . "<th>Accion</th>"
            . "</tr></thead><tbody>";

        while ($fila = mysqli_fetch_assoc($res)) {
            $tabla .= "<tr>"
                . "<td style=\"text-align: center\">" . $fila["codigo"] . "</td>"
                . "<td style=\"text-align: center\">" . $fila["nombre_prod"] . "</td>"
                . "<td style=\"text-align: center\">" . $fila["descripcion"] . "</td>"
                . "<td style=\"text-align: center\">$" . $fila["precio_unit"] . "</td>"
                . "<td style=\"text-align: center\">" . $fila["existencia"] . "</td>"
                . "<td style=\"text-align: center\">" . $fila["imagen"] . "</td>"
                . "<td style=\"text-align: center\"><img style=\"width: 200px\" class= 'imagentabla 'src= '" . $fila["imagen"] . "'></td>"
                . "<td style=\"text-align: center\"><a href=\"javascript:cargar('" . $fila["codigo"] . "','" . $fila["nombre_prod"] . "','" . $fila["descripcion"] . "','" . $fila["precio_unit"] . "','" . $fila["existencia"] . "','" . $fila["imagen"] . "')\">Seleccionar</a></td>"
                . "</tr>";
        }
        $tabla .= "</tbody></table>";
        $res->close();
        return $tabla;

    }

    public function insertar($obj)
    {
        $prod = new Producto();
        $prod = $obj;
        $ruta = 'imagenes/' . $_FILES['imagen']['name'];

        if ($prod->getExistencia() < 15) {

            $cantidad = 15;
        } else {

            $cantidad = $prod->getExistencia();
        }

        $sql = "insert into producto (nombre_prod, descripcion, precio_unit, existencia, imagen) values ('" . $prod->getNombreProducto() . "','" . $prod->getDescripcion() . "'," . $prod->getPrecioUnit() . "," . $cantidad . ", '$ruta');";
        $this->conectar();

        if (empty($prod->getNombreProducto()) || empty($prod->getPrecioUnit()) || empty($prod->getExistencia()) || empty($prod->getDescripcion()) || ($ruta == "imagenes/")) {
            echo "<script>swal({title:'Error',text:'Por favor, complete todos los campos junto con su imagen',type:'error'});</script>";
        } elseif ($this->con->query($sql)) {
            //aplicamos cuadros de mensaje de SweetAlert
            echo "<script>swal({title:'Exito',text:'El registro fue insertado satisfactoriamente',type:'success'});</script>";
        } else {
            echo "<script>swal({title:'Error',text:'El registro no se pudo insertar, por favor verifique el codigo, precio, y cantidad ingresados',type:'error'});</script>";
        }
        $this->desconectar();
    }

    public function eliminar($codigo)
    {
        $sql = "delete from producto where codigo=$codigo";
        $this->conectar();
        if ($this->con->query($sql)) {
            //aplicamos cuadros de mensaje de SweetAlert
            echo "<script>swal({title:'Exito',text:'El registro fue eliminado satisfactoriamente',type:'success'});</script>";
        } else {
            echo "<script>swal({title:'Error',text:'El registro no se pudo eliminar',type:'error'});</script>";
        }
        $this->desconectar();
    }

    public function modificar($codigo, $nombre, $descripcion, $precio, $existencia)
    {

        if ($existencia < 15) {

            $cantidad = 15;
        } else {

            $cantidad = $existencia;
        }

        $sql = "update producto set nombre_prod='$nombre', descripcion='$descripcion', precio_unit='$precio', existencia='$cantidad' where codigo=$codigo";
        $this->conectar();
        if ($this->con->query($sql)) {
            //aplicamos cuadros de mensaje de SweetAlert
            echo "<script>swal({title:'Exito',text:'El registro fue modificado satisfactoriamente',type:'success'});</script>";
            //echo "<script>bs4pop.notice('El registro fue modificado satisfactoriamente', {type: 'success'});</script>";
        } else {
            echo "<script>swal({title:'Error',text:'El registro no se pudo modificar',type:'error'});</script>";
        }
        $this->desconectar();
    }

    public function getFiltro($buscar, $criterio)
    {

        //determine which page number visitor is currently on
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $results_per_page = 5;

        //determine the sql LIMIT starting number for the results on the displaying page
        $page_first_result = ($page - 1) * $results_per_page;
        //retrieve the selected results from database

        $sql = "select * from producto where $criterio like '%$buscar%' LIMIT $page_first_result, $results_per_page";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();

        //ahora crearemos una tabla en bootstrap
        //los enlaces a los css y js estaran en las respectivas visatas
        $tabla = "<table class='table'>"
            . "<thead class='thead-dark'>";

        $tabla .= "<tr>"
            . "<th>Codigo</th>"
            . "<th>Nombre</th>"
            . "<th>Descripcion</th>"
            . "<th>Precio</th>"
            . "<th>Cantidad</th>"
            . "<th>Ruta de imagen</th>"
            . "<th>Imagen</th>"
            . "<th>Accion</th>"
            . "</tr></thead><tbody>";

        while ($fila = mysqli_fetch_assoc($res)) {

            $tabla .= "<tr>"
                . "<td style=\"text-align: center\">" . $fila["codigo"] . "</td>"
                . "<td style=\"text-align: center\">" . $fila["nombre_prod"] . "</td>"
                . "<td style=\"text-align: center\">" . $fila["descripcion"] . "</td>"
                . "<td style=\"text-align: center\">$" . $fila["precio_unit"] . "</td>"
                . "<td style=\"text-align: center\">" . $fila["existencia"] . "</td>"
                . "<td style=\"text-align: center\">" . $fila["imagen"] . "</td>"
                . "<td style=\"text-align: center\"><img style=\"width: 200px\" class= 'imagentabla 'src= '" . $fila["imagen"] . "'></td>"
                . "<td><a name='seleccion' href=\"javascript:cargar('" . $fila["codigo"] . "','" . $fila["nombre_prod"] . "','" . $fila["descripcion"] . "','" . $fila["precio_unit"] . "','" . $fila["existencia"] . "','" . $fila["imagen"] . "')\">Seleccionar</a></td>"
                . "</tr>";

            $track = 1;

        }

        if (mysqli_fetch_assoc($res) == '' && !isset($track)) {
            $tabla .= "<tr>"
                . "<td colspan=\"8\" style=\"text-align: center\">No se encontraron resultados</td>"
                . "</tr>";
        }

        //             if (is_null(mysqli_fetch_assoc($res))) {
        //                     $tabla .= "<tr>"
        //         . "<td colspan=\"8\" style=\"text-align: center\">No se encontraron resultados</td>"
        //         . "</tr>";
        //     } else {

        // while ($fila = mysqli_fetch_assoc($res)) {

        //     $tabla .= "<tr>"
        //         . "<td style=\"text-align: center\">" . $fila["codigo"] . "</td>"
        //         . "<td style=\"text-align: center\">" . $fila["nombre_prod"] . "</td>"
        //         . "<td style=\"text-align: center\">" . $fila["descripcion"] . "</td>"
        //         . "<td style=\"text-align: center\">$" . $fila["precio_unit"] . "</td>"
        //         . "<td style=\"text-align: center\">" . $fila["existencia"] . "</td>"
        //         . "<td style=\"text-align: center\">" . $fila["imagen"] . "</td>"
        //         . "<td style=\"text-align: center\"><img style=\"width: 200px\" class= 'imagentabla 'src= '" . $fila["imagen"] . "'></td>"
        //         . "<td><a name='seleccion' href=\"javascript:cargar('" . $fila["codigo"] . "','" . $fila["nombre_prod"] . "','" . $fila["descripcion"] . "','" . $fila["precio_unit"] . "','" . $fila["existencia"] . "','" . $fila["imagen"] . "')\">Seleccionar</a></td>"
        //         . "</tr>";
        // }
        // }

        $tabla .= "</tbody></table>";
        $res->close();
        return $tabla;

    }

}
?>
