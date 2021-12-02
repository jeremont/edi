<?php
function cambiarDatosUsuario($correo, $nombre, $apellido, $direccion)
{
    include 'php/conexion.php';

    $updateUsuario = $con->prepare("UPDATE tb_usuarios SET usr_nombre='$nombre', usr_apellido='$apellido', usr_direccion='$direccion' WHERE usr_correo = '$correo'");

    if ($updateUsuario->execute()) {
        echo "<script>swal({title:'Exito',text:'Datos modificados correctamente.',type:'success'});</script>";

    } else {
        echo "<script>swal({title:'Error',text:'No se pudieron modificar los datos.',type:'error'});</script>";

    }

}

function cambiarPwdusuario($correo, $pwd, $pwdNueva, $pwdNueva2)
{
    include 'php/conexion.php';

    if ($pwdNueva2 !== $pwdNueva) {
        echo "<script>swal({title:'Error',text:'Los campos de contraseña nueva no coinciden.',type:'error'});</script>";

    } else {

        $stmt = $con->prepare("SELECT usr_pwd from tb_usuarios where usr_correo = '$correo'");
        // Ejecutamos
        $stmt->execute();
        // Mostramos los resultados
        $arr       = $stmt->fetch(PDO::FETCH_ASSOC);
        $pwdActual = $arr['usr_pwd'];
        //echo "<script>swal({title:'Exito',text:'Su consulta fue enviada. Nos estaremos poniendo en contacto con usted a la brevedad.$pwd',type:'success'});</script>";
        if (!password_verify($pwd, $pwdActual)) {
            echo "<script>swal({title:'Error',text:'Tu contraseña ingresada no coincide con la actual.',type:'error'});</script>";

        } else {

            $pass      = password_hash($pwdNueva, PASSWORD_DEFAULT);
            $updatePwd = $con->prepare("UPDATE tb_usuarios SET usr_pwd='$pass', usr_pwd_b='$pwdNueva' WHERE usr_correo = '$correo'");

            if ($updatePwd->execute()) {
                echo "<script>swal({title:'Exito',text:'Contraseña modificada correctamente.',type:'success'});</script>";

            } else {
                echo "<script>swal({title:'Error',text:'Hubo un problema al cambiar la contraseña. Por favor intenta nuevamente.',type:'error'});</script>";

            }

        }

    }

}
