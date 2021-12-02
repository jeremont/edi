<?php

function registrar($nombre, $mail, $pwd)
{

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        include 'conexion.php';

        #chequea si el mail ya esta registrado
        $stmt = $con->prepare("SELECT 1 from tb_usuarios where usr_correo =?");
        $stmt->bindParam(1, $mail);

        // Ejecutamos
        $stmt->execute();

        // recorremos las filas en busca del mail
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($arr)) {

            $pass   = password_hash($pwd, PASSWORD_DEFAULT);
            $tipo   = '1';
            $estado = 'A';

            #registrando al usuario
            $stmt = $con->prepare("INSERT INTO tb_usuarios (usr_pwd, usr_tipo, usr_estado, usr_nombre, usr_correo, usr_alias, usr_pwd_b) VALUES (?, ?, ?, ?, ?, ?, ?)");
            // Bind
            $rol      = 1;
            $idEstado = 1;

            $stmt->bindParam(1, $pass);
            $stmt->bindParam(2, $tipo);
            $stmt->bindParam(3, $estado);
            $stmt->bindParam(4, $nombre);
            $stmt->bindParam(5, $mail);
            $stmt->bindParam(6, $nombre);
            $stmt->bindParam(7, $pwd);

            //print_r($stmt);
            // Execute

            if ($stmt->execute()) {
                echo "<script>swal({title:'Exito',text:'El registro se realizó correctamente. Ya podes ingresar con tus credenciales',type:'success'});</script>";
            } else {
                echo "Error";
            }
        } else {
            echo '<script type="text/javascript">
            alert("El mail ya está siendo utilizado");
            </script>';
            echo '<script type="text/javascript">
            setTimeout(window.location.href="login.php", 5000);
            </script>';
        }

    } else {
        echo "Metodo no autorizado";
    }

}

function reenviarPwd($mail)
{
    include 'conexion.php';
    include 'sendmail.php';
    $stmt = $con->prepare("SELECT usr_pwd_b, usr_alias from tb_usuarios where usr_correo =? limit 1");
    $stmt->bindParam(1, $mail);

    // Ejecutamos
    if ($stmt->execute()) {
        $arr = $stmt->fetch(PDO::FETCH_ASSOC);

        $pwd   = $arr['usr_pwd_b'];
        $alias = $arr['usr_alias'];

        sendPwd($mail, $pwd, $alias);

    }

}
