<?php

include ('conexion.php');



$Email=$_POST['Email'];
  
	$conexion=conectar();
   $consulta="SELECT * FROM datos WHERE Email='$Email'";
   $resultadoc=mysqli_query($conexion,$consulta);
   
if(!empty($resultadoc) AND mysqli_num_rows($resultadoc) > 0){
   	header('Location: Home/index.php?Email='.$Email);
   }
   else {

   	print('
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


   		<script> alert("Ingrese un email registrado");</script>



	<div class="limiter">
		<div class="container-login100" style="background-image: url(images/bg-01.jpg);">
			<div class="wrap-login100">
				<form name="login" class="login100-form validate-form" action="validar.php" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span><br>
<h6 style="text-align: center;">Empresa Inteligente 4.0</h6> <br>
					<span class="login100-form-title p-b-34 p-t-27">
						LOG IN<br>
						
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username" >
						<input class="input100" type="text" name="Email" placeholder="USUARIO (Email)">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
<!--
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Razon Social">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>-->

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Recordar
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" >
						INGRESAR
						<a   href="../index.php">
						</button href="../index.php">
					</div>

					<div >
						<a class="txt1" href="../registro/index.php" style="color: black;">
							<h6>Registrarse</h6>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
   }
   

');
};
   mysqli_close($conexion);
   ?>