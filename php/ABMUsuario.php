

            <link rel="stylesheet" href="css/estilo.css">



        <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bs4.pop.js"></script>
    <link rel="stylesheet" href="css/bs4.pop.css">-->

<?php
//include 'credenciales.php';
include 'Usuario.php';
include 'conexion.php';
//include 'coneccion.php';

class ABMUsuario
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

        $query = "select usr_id, usr_alias, usr_nombre, usr_tipo, usr_estado, usr_correo from tb_usuarios";
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

        $query = "select usr_id, usr_alias, usr_nombre, usr_tipo, usr_estado, usr_correo from tb_usuarios where $criterio like '%$buscar%'";
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
        $query = "select usr_id, usr_alias, usr_nombre, usr_tipo, usr_estado, usr_correo from tb_usuarios";
        $this->conectar();
        $res = $this->con->query($query);

        $datosTabla = mysqli_num_rows($res);

        if ($datosTabla == 0) {
            $_SESSION['tablaUsuarios'] = "Vacia";

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
        $query = "SELECT usr_id, usr_alias, usr_nombre, usr_tipo, usr_estado, usr_correo FROM tb_usuarios LIMIT " . $page_first_result . ',' . $results_per_page;

        $this->conectar();
        $res = $this->con->query($query);

        $this->desconectar();

        //ahora crearemos una tabla en bootstrap
        //los enlaces a los css y js estaran en las respectivas visatas
        $tabla = "<table class='table' style=\"border: 100px\">"
            . "<thead class='thead-dark'>";

        $tabla .= "<tr style=\"text-align: center\">"
            . "<th>ID</th>"
            . "<th>Alias</th>"
            . "<th>Nombre</th>"
            . "<th>Tipo de Usuario</th>"
            . "<th>Estado</th>"
            . "<th>Correo</th>"
            . "<th>Accion</th>"
            . "</tr></thead><tbody>";

        while ($fila = mysqli_fetch_assoc($res)) {
            $tabla .= "<tr>"
            . "<td style=\"text-align: center\">" . $fila["usr_id"] . "</td>"
            . "<td style=\"text-align: center\">" . $fila["usr_alias"] . "</td>"
            . "<td style=\"text-align: center\">" . $fila["usr_nombre"] . "</td>"
            . "<td style=\"text-align: center\">" . $fila["usr_tipo"] . "</td>"
            . "<td style=\"text-align: center\">" . $fila["usr_estado"] . "</td>"
            . "<td style=\"text-align: center\">" . $fila["usr_correo"] . "</td>"
            //. "<td style=\"text-align: center\"><img style=\"width: 200px\" class= 'imagentabla 'src= '".$fila["imagen"]."'></td>"
             . "<td style=\"text-align: center\"><a href=\"javascript:cargar('" . $fila["usr_id"] . "','" . $fila["usr_alias"] . "','" . $fila["usr_nombre"] . "','" . $fila["usr_tipo"] . "','" . $fila["usr_estado"] . "','" . $fila["usr_correo"] . "')\">Seleccionar</a></td>"
                . "</tr>";
        }
        $tabla .= "</tbody></table>";
        $res->close();
        return $tabla;

    }

    public function insertar($obj)
    {
        $prod = new Usuarios();
        $prod = $obj;
        //$ruta = 'imagenes/'.$_FILES['imagen']['name'];

        $alias  = $prod->getAlias();
        $nombre = $prod->getNombre();
        $tipo   = $prod->getTipo();
        $estado = $prod->getEstado();
        $correo = $prod->getCorreo();

        $flagMail = $this->checkMail($correo);

        if (!$flagMail == 0) {
            echo "<script>swal({title:'Error',text:'El mail ingresado ya existe',type:'error'});</script>";
        } else {

            $pass = substr(sha1(mt_rand()), 17, 8);

            $passHash = password_hash($pass, PASSWORD_DEFAULT);

            $sql = "insert into tb_usuarios (usr_alias, usr_nombre, usr_tipo, usr_estado, usr_correo, usr_pwd, usr_pwd_b) values ('$alias', '$nombre', '$tipo', '$estado', '$correo', '$passHash', '$pass');";
            $this->conectar();

            if (empty($prod->getAlias()) || empty($prod->getNombre()) || empty($prod->getTipo()) || empty($prod->getEstado())) {
                echo "<script>swal({title:'Error',text:'Por favor, complete todos los campos.',type:'error'});</script>";
            } elseif ($this->con->query($sql)) {
                //aplicamos cuadros de mensaje de SweetAlert
                echo "<script>swal({title:'Exito',text:'El registro fue insertado satisfactoriamente',type:'success'});</script>";
            } else {
                echo "<script>swal({title:'Error',text:'El registro no se pudo insertar, por favor verifique la informacion ingresada.',type:'error'});</script>";
            }
            $this->desconectar();

        }

    }

    public function checkMail($correo)
    {

        $query = "select * from tb_usuarios where usr_correo='$correo'";
        $this->conectar();

        $res              = $this->con->query($query);
        $number_of_result = mysqli_num_rows($res);
        $this->desconectar();

        return $number_of_result;

    }

    public function eliminar($codigo)
    {
        $sql = "delete from tb_usuarios where usr_id=$codigo";
        $this->conectar();
        if ($this->con->query($sql)) {
            //aplicamos cuadros de mensaje de SweetAlert
            echo "<script>swal({title:'Exito',text:'El registro fue eliminado satisfactoriamente',type:'success'});</script>";
        } else {
            echo "<script>swal({title:'Error',text:'El registro no se pudo eliminar.',type:'error'});</script>";
        }
        $this->desconectar();
    }

    public function modificar($codigo, $alias, $nombre, $tipo, $estado, $correo)
    {

        $sql = "update tb_usuarios set usr_alias='$alias', usr_nombre='$nombre', usr_tipo='$tipo', usr_estado='$estado', usr_correo='$correo' where usr_id='$codigo'";
        $this->conectar();
        if ($this->con->query($sql)) {
            //aplicamos cuadros de mensaje de SweetAlert
            echo "<script>swal({title:'Exito',text:'El registro fue modificado satisfactoriamente',type:'success'});</script>";
            //echo "<script>bs4pop.notice('El registro fue modificado satisfactoriamente', {type: 'success'});</script>";
        } else {
            echo "<script>swal({title:'Error',text:'El registro no se pudo modificar.',type:'error'});</script>";
        }
        $this->desconectar();
    }

    public function getFiltro($buscar, $criterio)
    {
        $sql = "select usr_id, usr_alias, usr_nombre, usr_tipo, usr_estado, usr_correo FROM tb_usuarios where $criterio like '%$buscar%'";
        $this->conectar();
        $res = $this->con->query($sql);
        $this->desconectar();
        //ahora crearemos una tabla en bootstrap
        //los enlaces a los css y js estaran en las respectivas visatas
        $tabla = "<table class='table'>"
            . "<thead class='thead-dark'>";

        $tabla .= "<tr>"
            . "<th>ID</th>"
            . "<th>Alias</th>"
            . "<th>Nombre</th>"
            . "<th>Tipo de Usuario</th>"
            . "<th>Estado</th>"
            . "<th>Correo</th>"
            . "<th>Accion</th>"
            . "</tr></thead><tbody>";

        while ($fila = mysqli_fetch_assoc($res)) {
            $tabla .= "<tr>"
            . "<td style=\"text-align: center\">" . $fila["usr_id"] . "</td>"
            . "<td style=\"text-align: center\">" . $fila["usr_alias"] . "</td>"
            . "<td style=\"text-align: center\">" . $fila["usr_nombre"] . "</td>"
            . "<td style=\"text-align: center\">" . $fila["usr_tipo"] . "</td>"
            . "<td style=\"text-align: center\">" . $fila["usr_estado"] . "</td>"
            . "<td style=\"text-align: center\">" . $fila["usr_correo"] . "</td>"
            //. "<td style=\"text-align: center\"><img style=\"width: 200px\" class= 'imagentabla 'src= '".$fila["imagen"]."'></td>"
             . "<td style=\"text-align: center\"><a href=\"javascript:cargar('" . $fila["usr_id"] . "','" . $fila["usr_alias"] . "','" . $fila["usr_nombre"] . "','" . $fila["usr_tipo"] . "','" . $fila["usr_estado"] . "','" . $fila["usr_correo"] . "')\">Seleccionar</a></td>"
                . "</tr>";

            $track = 1;

        }

        if (mysqli_fetch_assoc($res) == '' && !isset($track)) {
            $tabla .= "<tr>"
                . "<td colspan=\"8\" style=\"text-align: center\">No se encontraron resultados</td>"
                . "</tr>";
        }

        $tabla .= "</tbody></table>";
        $res->close();
        return $tabla;

    }

}
?>
