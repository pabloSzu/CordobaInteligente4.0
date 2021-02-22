<?php

include ('../conexion.php');

    $conexion=conectar();






	$var1 = $_GET["Email"];






$aux=-1;
$sqlb="SELECT * from preguntas";
$resultb=mysqli_query($conexion,$sqlb);

		while($mostrarb=mysqli_fetch_array($resultb))
		{
			$aux=$aux+1;
		};
	




   $consulta99="SELECT * FROM valores WHERE emp_email='$var1'";
   $resultado99=mysqli_query($conexion,$consulta99);
   
if(!empty($resultado99) AND mysqli_num_rows($resultado99) > 0){
   	 
   }
   else
   	{for ($i = 1; $i <= $aux; $i++) {

				 $sql2="INSERT INTO valores(emp_email, preg_id, valor) 
				    						VALUES( '".$var1."' ,
												    '".$i."',
												    NULL )";

				 $resultado2=mysqli_query($conexion,$sql2) or die ('Error en el query');	
				
				};};





?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Desarrollado por Pablo Szulman</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

    </head>


	</head>
	<body>

		<!-- Header -->
			<header id="header" class="alt">
				<div class="logo"><a href="https://mincyt.cba.gov.ar/cordoba-4-0/" target="_blank">CÓRDOBA <span>4.0</span></a></div>
				<a href="#menu">Menu</a>
			</header>

<a name="ej0"></a>


		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="#ej0">Home</a></li>
					<li><a href="#ej">Diagnóstico</a></li>
					<li><a href="#ej2">Actualizar diagnóstico</a></li>
				</ul>
			</nav>
		<!-- Banner -->
			<section class="banner full">
				<article>
					<img src="images/slide01.png"  alt="" />
					<div class="inner">
						
					</div>
				</article>
				<article>
					<img src="images/slide02.jpg" alt="" />
					<div class="inner">
						<header>
							<p>Siempre se puede</p>
							<h2>Mejorar</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide03.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>La virtualización es el</p>
							<h2>Presente</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide04.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Tu tiempo es lo más</p>
							<h2>Valioso</h2>
						</header>
					</div>
				</article>
				<article>
					<img src="images/slide05.jpg"  alt="" />
					<div class="inner">
						<header>
							<p>Llevando tu emprendimiento a otro</p>
							<h2>Nivel</h2>
						</header>
					</div>
				</article>
			</section>

		<!-- One -->








		<!-- Two -->
			<section id="two" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Adaptando tu empresa a la tecnología</p>
						<h2>EL FUTURO A TUS PIES</h2>
					</header>
				</div>
			</section>

		<!-- Three -->
		
			<section id="three" class="wrapper style2" name="form123">
				<div class="inner">
				<A name ="ej" style="text-decoration:none;">		
					<header class="align-center">
						<p class="special">¿Estás listo para decir que tu empresa es inteligente?</p>
						<h2>DIAGNÓSTICO</h2>
					</header>
				</A>

<?php





print('<form class="form" action="mandar_datos.php?Email=').$var1;
print('" method="POST">');

	
 

/////////////////////////////////////////////////////////////////SECCION//////////////////////////////////////////
$sql1="SELECT * from seccion";
$result1=mysqli_query($conexion,$sql1);

		while($mostrar1=mysqli_fetch_array($result1)){
		print('<section id="tree" class="wrapper style2">
				<div class="inner">
					<header class="align-left">
						<p>Sección de</p>
						<h2>').$mostrar1['seccion_desc'];
		print('</h2></header></div></section>');

/////////////////////////////////////////////////////////////////PREGUNTAS//////////////////////////////////////////

						$sql2="SELECT * from preguntas where preg_seccion_id =   '".$mostrar1['id']."'   ";
						$result2=mysqli_query($conexion,$sql2);
								while($mostrar2=mysqli_fetch_array($result2)){

						print('<p><h3>').$mostrar2['preg_texto'];
						print('<hr style="height: 1px; background-color: black;"</hr></h4><br>');
/////////////////////////////////////////////////////////////////RESPUESTAS//////////////////////////////////////////



										$sql3="SELECT * from respuestas where preg_id =  '".$mostrar2['id']."' ";
										$result3=mysqli_query($conexion,$sql3);
												while($mostrar3=mysqli_fetch_array($result3) ){
													print('<input type="radio" class="letras" name="').$mostrar2['id'];
													print('" value="').$mostrar3['resp_valor'];
													print('"');



													$aux123=$mostrar2['id'];
													$aux12345=$mostrar3['id'];


													   $consultad="SELECT r.id FROM preguntas p,respuestas r,valores v WHERE v.preg_id='$aux123' AND r.resp_valor=v.valor and r.preg_id='$aux123' and r.id='$aux12345'  and  v.emp_email='$var1'  ";


													   $resultadod=mysqli_query($conexion,$consultad);
													   
													if(!empty($resultadod) AND mysqli_num_rows($resultadod) > 0){
													   	print('checked>').$mostrar3['resp_texto'];
													   	print('<br>');

													   }
													   else {

														print('>').$mostrar3['resp_texto'];
													print('<br>');
													};
									};

										print('</p>');




					};

};




print('<a name="ej2"></a><br><br><br><br><p><input type="submit" style="font-size:30px; border-radius:10px;" value="Generar diagnóstico" >
	
    
  </p></form>

');	 

	

 ?>

<br><br>


					<div class="gallery">
						<div>
							<div class="image fit">
								<a href="https://www.cba.gov.ar/reparticion/ministerio-de-ciencia-y-tecnologia/" target="_blank"><img src="images/MIN.png" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="https://www.ubp.edu.ar/" target="_blank"><img src="images/UBP.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="https://www.unc.edu.ar/" target="_blank"><img src="images/UNC.jpg" alt="" /></a>
							</div>
						</div>
						<div>
							<div class="image fit">
								<a href="https://www.sanfrancisco.utn.edu.ar/" target="_blank"><img src="images/UTN.png" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</section>


		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">

						<li><a href="mailto:economiadelconocimientomincyt@gmail.com" class="icon fa-envelope-o"> <span class="label">Email</span></a></li>

					</ul>
				</div>
				<div class="copyright">
					Email para consultas .
				</div>

				<div style="position: absolute;
							 left: 5px;

							 margin: 10px,10px;">&copy;UBP - Desarrollado por 
						<a href="mailto:pablo_szu@hotmail.com"><span>Pablo Szulman</a>

				</div>
<br>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>

</html>