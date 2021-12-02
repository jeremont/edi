<!DOCTYPE html>
<html>
<head ><meta charset="UTF-8">



<?php
use PHPMailer\PHPMailer\PHPMailer;

function enviarMail()
{
//Include required PHPMailer files
    require 'PHPMailer.php';
    require 'SMTP.php';
    require 'Exception.php';
//Define name spaces

    if (isset($_POST['enviarConsulta'])) {

        if (isset($_POST['consulta']) && isset($_POST['correo'])) {
            //$name = $_POST['name'] . " " . $_POST['last_name'];
            $email = $_POST['correo'];

            $subject = "Se ha recibido una nueva consulta: ";
            $body    = "Consulta de: " . $email . " <br> <br>" . nl2br($_POST['consulta']); //nl2br permite los enters en el cuerpo del mail

        }

    }

//Create instance of PHPMailer
    $mail = new PHPMailer();
//Set mailer to use smtp
    $mail->isSMTP();
//Define smtp host
    //$mail->Host = "smtp.office365.com";
    $mail->Host = "smtp.gmail.com";

//Enable smtp authentication
    $mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
    //$mail->SMTPSecure = "STARTTLS";
    $mail->SMTPSecure = "TLS";

//Port to connect smtp
    $mail->Port = "587";
//Set gmail username
    $mail->Username = "soporte.mrsandwich@gmail.com";
//Set gmail password
    $mail->Password = "mrsandwich123";
//Email subject
    $mail->Subject = ("$subject $email");
//Set sender email FROM
    $mail->setFrom($email);

//Enable HTML
    $mail->isHTML(true);
//Attachment
    //$mail->addAttachment('img/attachment.png');
    //Email body
    $mail->Body = $body;
//Add recipient TO:
    /*if (isset($_POST['contactophp'])) {
    $mail->addAddress('soporte.bibliotecar@gmail.com');
    }

    if (isset($_POST['registrophp'])) {
    $mail->addAddress($email);

    }*/

    $mail->addAddress('soporte.mrsandwich@gmail.com');

    //$mail->SMTPDebug = 6;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true,
        ),
    );

//Finally send email

    if ($mail->send()) {
        //$status = "success";
        //$response = "Email is sent!";
        echo "<script>swal({title:'Exito',text:'Su consulta fue enviada. Nos estaremos poniendo en contacto con usted a la brevedad.',type:'success'});</script>";

        //Closing smtp connection
        $mail->smtpClose();

        //exit(json_encode(array("status" => $status, "response" => $response)));
    }

}

function sendPwd($email, $pwd, $alias)
{
//Include required PHPMailer files
    require 'PHPMailer.php';
    require 'SMTP.php';
    require 'Exception.php';
//Define name spaces

    $subject = "Mr Sandwich: Envio de contraseña";
    $body    = "Hola " . $alias . "! <br> <br> Te estamos enviando este mail porque estas registrado en Mr Sandwich. Recibimos una solicitud de envio de contraseña a tu mail. <br> <br> Tu contraseña es: " . "<b>" . $pwd . "</b> <br> <br> Cordialmente,<br>Mr. Sandwich";

//Create instance of PHPMailer
    $mail = new PHPMailer();
//Set mailer to use smtp
    $mail->isSMTP();
//Define smtp host
    //$mail->Host = "smtp.office365.com";
    $mail->Host = "smtp.gmail.com";

//Enable smtp authentication
    $mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
    //$mail->SMTPSecure = "STARTTLS";
    $mail->SMTPSecure = "TLS";

//Port to connect smtp
    $mail->Port = "587";
//Set gmail username
    $mail->Username = "soporte.mrsandwich@gmail.com";
//Set gmail password
    $mail->Password = "mrsandwich123";
//Email subject
    $mail->Subject = ("$subject $email");
//Set sender email FROM
    $mail->setFrom($email);

//Enable HTML
    $mail->isHTML(true);
//Attachment
    //$mail->addAttachment('img/attachment.png');
    //Email body
    $mail->Body = $body;
//Add recipient TO:

    $mail->addAddress($email);

    //$mail->SMTPDebug = 6;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true,
        ),
    );

//Finally send email

    if ($mail->send()) {
        $flag = '0';
        echo "<script>swal({title:'Exito',text:'Enviamos tu contraseña a tu correo electronico. Por favor revisa tu bandeja de entrada.',type:'success'});</script>";
    }
    //Closing smtp connection
    $mail->smtpClose();

    //exit(json_encode(array("status" => $status, "response" => $response)));
}

//Enviar Pedido

function enviarMailPedido($email, $name, $precio)
{
//Include required PHPMailer files
    require 'PHPMailer.php';
    require 'SMTP.php';
    require 'Exception.php';
//Define name spaces

    $subject = "Confirmacion de pedido";
    $body    = "Hola " . $name . "! <br> <br> Te informamos que tu pedido fue confirmado. Debajo podes ver el monto total a pagar. <br> <br> El total de tu pedido es: <b>$" . $precio . "</b> <br><br> <br>Saludos,<br> <b> Mr. Sandwich";
    //cargarCodigo2($pin, $email);

//Create instance of PHPMailer
    $mail = new PHPMailer();
//Set mailer to use smtp
    $mail->isSMTP();
//Define smtp host
    //$mail->Host = "smtp.office365.com";
    $mail->Host = "smtp.gmail.com";

//Enable smtp authentication
    $mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
    //$mail->SMTPSecure = "STARTTLS";
    $mail->SMTPSecure = "TLS";

//Port to connect smtp
    $mail->Port = "587";
//Set gmail username
    $mail->Username = "soporte.mrsandwich@gmail.com";
//Set gmail password
    $mail->Password = "mrsandwich123";
//Email subject
    $mail->Subject = ("$subject $email");
//Set sender email FROM
    $mail->setFrom($email);

//Enable HTML
    $mail->isHTML(true);
//Attachment
    //$mail->addAttachment('img/attachment.png');
    //Email body
    $mail->Body = $body;
//Add recipient TO:

    $mail->addAddress($email);

    //$mail->SMTPDebug = 6;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer'       => false,
            'verify_peer_name'  => false,
            'allow_self_signed' => true,
        ),
    );

//Finally send email

    if ($mail->send()) {
        $flag = '0';
        echo "<script>swal({title:'Exito',text:'Su pedido fue enviado. Acordate de revisar tu mail para seguir el pedido.',type:'success'});</script>";

    } else {

        echo "<script>swal({title:'Pedido enviado',text:'Tu pedido fue enviado, pero hubo un problema al enviarte el mail de confirmacion. Recorda que el monto a pagar es de $$precio',type:'info'});</script>";

    }
    //Closing smtp connection
    $mail->smtpClose();

    //exit(json_encode(array("status" => $status, "response" => $response)));
}

?>

    <title></title>
</head>
<body>
</body>
</html>
