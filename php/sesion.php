<?php

function iniciarSesion()
{
    include "conexion.php";
//session_start(); //starting the session for user profile page

    $ID       = $_POST['user'];
    $Password = $_POST['pass'];

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'tp_edi');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');

    $stmt = $con->prepare("SELECT usr_pwd, usr_alias, usr_tipo from tb_usuarios where usr_correo = '$ID'");
    // Ejecutamos
    $stmt->execute();

    // Mostramos los resultados
    $arr = $stmt->fetch(PDO::FETCH_ASSOC);

    $pwd      = $arr['usr_pwd'];
    $alias    = $arr['usr_alias'];
    $usr_tipo = $arr['usr_tipo'];
    if (password_verify($Password, $pwd)) {

        $Row_Numbers = 0;

//$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
        //$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

        $Link = mysqli_connect("localhost", "root", "", "tp_edi");

        $result = mysqli_query($Link, "SELECT * FROM tb_usuarios WHERE usr_correo= '$ID' AND usr_pwd= '$pwd'") or die(mysqli_error());

        $Row_Numbers = mysqli_num_rows($result);

        if ($Row_Numbers == 1) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user']     = $alias;
            $_SESSION['pid']      = $usr_tipo;
            $_SESSION['mail']     = $_POST['user'];
            $_SESSION['pass']     = $_POST['pass'];
            $_SESSION['start']    = time();
            $_SESSION['expire']   = $_SESSION['start'] + (60 * 60);

            header("Location: index.php");

        } else {
            $_SESSION['validar'] = "falso";

        }
        mysqli_close($Link);

    } else {

        $_SESSION['validar'] = "falso";

    }

}
