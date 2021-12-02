<!-------------------Login----------------------->

<?php
include_once 'php/islogin.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header("Location: /edi");
}
?>

<html>

<head>
	<title>Masajes Sandwich</title>
	<meta charset="utf-8">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sweetalert2.css">

	<link rel="stylesheet" href="css/login.css">


      <script src="js/jquery-3.3.1.slim.min.js"></script>

    <script src="js/bootstrap.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script src="js/jquery.js"></script>
</head>

<!---------------Build de panel--------------------->
<body>
	<div class="container" align="center">
	<div >
	<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 loginbox">
		<div class="panel" >
			<div class="panel-heading">
			<div id="header">
<a href="/edi"><p id="logo"><img style="height: 155px;"s src="images/icons/logo.jpg" ></a>

</p>
			</div>
			<div class="panel-body panel-pad">
				<div id="login-alert" class="alert alert-danger col-sm-12 login-alert"></div>

					<form method="POST" action="" id="loginform" class="form-horizontal" role="form">
						<div class="form-group">
						<!-- Button -->

						</div>
						<div class="input-group margT25">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
							<input id="login-username" type="text" class="form-control" name="user" value="" placeholder="Ingrese su email">
						</div>
						<div class="input-group margT25">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="login-password" type="password" class="form-control" name="pass" placeholder="Ingrese su contraseña">
							<!-- <input type="checkbox" onclick="mostrarPwd2()" style="margin-left: 5px; ">-->
						</div>


						<div class="form-group margT10">
						<!-- Button -->
							<div > <a style="color:black"  >
								<button type="submit" name="submit" data-dismiss="modal" class="btn btn-sm btn-dark btn-block" >Ingresar</button></a>
								<!-- onclick="return Verificar()"-->
							</div>
							<br>
													<div class="row">



      					<div class="col-md-12">

						<div class="forgot-password"> <input style="border: 0;outline: none; background-color: white; color: #007BFF;" value="Olvidaste tu contraseña?" type="submit" name="resetPwd"> </div>
						</div>
					</div>


<!----------------Llamadas a funciones de sesion y registro------------------->
							<?php
include "php/sesion.php";
if (isset($_POST['submit'])) {

    iniciarSesion();
}

if (isset($_SESSION['validar']) && $_SESSION['validar'] == "falso") {
    echo "<br>
           					 <label style=\"color:red\"> Usuario o contraseña incorrectos.</label>";
    session_destroy();

}

?>

           					 					<?php
if (isset($_POST['registro'])) {
    echo '<script>swal({
    title:"",
    text:"",
    imageUrl: "images/icons/logo.jpg",
    imageWidth: 400,
    html:\'<form method="POST" style="height:50%;"><br><h2 style="">Registro de usuario</h2><br><br><br><div style="display: table;"><h5 style="width: 150px;text-align: center;float:left;margin-right:15px;">Nombre: </h5><input required name="registroNombre" /></div><br><div style="display: table;"><h5 style="width: 150px;text-align: center; float:left; margin-right:15px;">Mail: </h5><input type="email" required name="registroMail" /></div><br><div style="display: table;"><h5 style="width: 150px;text-align: center;float:left;margin-right:15px;">Contraseña: </h5><input  minlength = "6" maxlength = "20" type="password" required name="registroPwd" id="registroPwd" /><input type="checkbox" style="margin-left: 10px;" onclick="mostrarPwd()"> Mostrar</div><br><br><br> <div> <input type="submit" style="background-color: #343A40; color:white; width: 150px; height: 50px;" name="confirmarRegistro" value="Confirmar"><br></div><br><br></form>\',
   showCancelButton: false,
      showConfirmButton: false,

    cancelButtonColor: "gray",
    confirmButtonColor: "#495F91",

    width: 500,
    padding: "3em"

});</script>
 ';
}
//unset($_POST['resetPwd']);
if (isset($_POST['resetPwd'])) {
    echo '<script>swal({
    title:"",
    text:"",
    imageUrl: "images/icons/logo.jpg",
    imageWidth: 400,
    html:\'<form method="POST" style="height:50%;"><br><br><h2 style="">Ingresa tu mail:</h2><br><input style="height: 50px;"required name="txtMail" /></div><br><br><div> <input type="submit" style="background-color: #343A40; color:white; width: 220px; height: 50px;" name="confirmarPwd" value="Confirmar"><br><br><br><br><h6 style="">Una vez confirmes, te enviaremos tu contraseña por correo.</h6></div><br><br></form>\',
   showCancelButton: false,
      showConfirmButton: false,

    cancelButtonColor: "gray",
    confirmButtonColor: "#495F91",

    width: 500,
    padding: "3em"

});</script>
 ';
}

include "php/registro.php";
if (isset($_POST['confirmarRegistro']) && isset($_POST['registroNombre']) && isset($_POST['registroMail']) && isset($_POST['registroPwd'])) {

    registrar($_POST['registroNombre'], $_POST['registroMail'], $_POST['registroPwd']);
    //echo "<script>swal({title:'Exito',text:'Su consulta fue enviada. Nos estaremos poniendo en contacto con usted a la brevedad.',type:'success'});</script>";

}

if (isset($_POST['confirmarPwd']) && isset($_POST['txtMail'])) {
    reenviarPwd($_POST['txtMail']);

}

?>
						</div>
						<div class="form-group">
							<div class="col-md-12 control">
								<div class="no-acc">
									No tenes cuenta?
									<input type="submit" name="registro" value="Registrarse">
								</div>
							</div>

						</div>
					</form>


				</div>
			</div>
		</div>
	</div>
</div>
</div>


</body>

<script type="text/javascript">

	function mostrarPwd() {
  var x = document.getElementById("registroPwd");
  var y = document.getElementById("login-password");


  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }

}

	function mostrarPwd2() {
  var y = document.getElementById("login-password");


  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }

}

</script>

</html>
