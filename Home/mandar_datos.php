<?php



include ('../conexion.php');

    $conexion=conectar();

   






$aux=-1;
$sqlb="SELECT * from preguntas";
$resultb=mysqli_query($conexion,$sqlb);

		while($mostrarb=mysqli_fetch_array($resultb))
		{
			$aux=$aux+1;
		};
	




$variable = $_GET["Email"];

   for ($i = 1; $i <= $aux; $i++) {


				if(isset($_POST[$i])){
				 $sql21="UPDATE valores SET emp_email='".$variable."', preg_id=".$i.", valor = ".$_POST["$i"]." WHERE  emp_email='".$variable."'
											AND preg_id=".$i."    ";

				 $resultado21=mysqli_query($conexion,$sql21) or die ('Error en el query');	
				}
				else
				{
				 $sql21="UPDATE valores SET emp_email='".$variable."', preg_id=".$i.", valor = NULL WHERE  emp_email='".$variable."'
											AND preg_id=".$i." ";

				 $resultado21=mysqli_query($conexion,$sql21) or die ('Error en el query');	
				}
   
};






 

print('<html>
	<head>
		<title>Desarrollado por Pablo Szulman1</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body style="background-color:#F6F6F6;">
     <article>
						<div  style="padding:3%; size:400px,350px;">
						<header style="background-color:#D1E6FF; border-radius:5px; text-align:center; font-size:20px;">
							<p>Volver al <a href="index.php?Email=').$variable;
print('"> >PRINCIPAL</a></p>

						</header>
					</div>
				</article>

				<h1 style="text-align: center; font-size:150%">GRÁFICO GENERAL AUTODIAGNÓSTICO</h1>
	');


 mysqli_close($conexion);

		?>		
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

/* Create chart instance */
var chart = am4core.create("chartdiv", am4charts.RadarChart);




chart.data = [
<?php 
$conexion123=conectar();
$sql123="SELECT AVG(v.valor) valor, s.seccion_desc seccion from preguntas p, seccion s, valores v where v.preg_id=p.id and p.preg_seccion_id=s.id 
and v.emp_email='$variable' and s.id!=8 and s.id!=9 and s.id!=10  group by s.id";
$result123=mysqli_query($conexion123,$sql123);

		while($mostrar123=mysqli_fetch_array($result123))
		{
			//echo '{"country": "'.$mostrar123["preg_id"].'" , ';
			echo '{"country": "'.$mostrar123["seccion"].'" , ';
			echo ' "litres": "'.$mostrar123["valor"].'" }, ';
		};
		 mysqli_close($conexion123);
		?>
];




/* Create axes */
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "country";

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.axisFills.template.fill = chart.colors.getIndex(2);
valueAxis.renderer.axisFills.template.fillOpacity = 0.05;

/* Create and configure series */
var series = chart.series.push(new am4charts.RadarSeries());
series.dataFields.valueY = "litres";
series.dataFields.categoryX = "country";
series.name = "Sales";
series.strokeWidth = 3;


}); // end am4core.ready()
</script>



<!-- HTML -->
<div id="chartdiv" style="background-color: #EAEBEE;"></div>











<br>
<br>
<hr style="height: 2px; background-color: black; position: absolute;left:5%;	right:5%; "></hr>
<br>
<br>
<br>





<h2 style="text-align: center; background-color: #FFF2CE">MANUFACTURA Y MÁQUINAS</h2>
<h3 style="text-align: center; background-color: #E6FFBB">
<?php
$conexion123=conectar();
$sqlM="SELECT AVG(v.valor) valor from preguntas p, seccion s, valores v where v.preg_id=p.id and p.preg_seccion_id=s.id 
and v.emp_email='$variable' and s.id!=8 and s.id!=9 and s.id!=10  and p.preg_seccion_id=1";
$resultM=mysqli_query($conexion123,$sqlM);
while($mostrarM=mysqli_fetch_array($resultM))
		{
			print('').$mostrarM["valor"];
			print('</h3>');//echo '{"country": "'.$mostrar123["preg_id"].'" , ';

		};
		 mysqli_close($conexion123);
?>





<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////-->


<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_kelly);
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv1", am4charts.XYChart);
chart.padding(40, 40, 40, 40);
var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "network";
categoryAxis.renderer.minGridDistance = 1;
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.disabled = true;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "network";
series.dataFields.valueX = "MAU";
series.tooltipText = "{valueX.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.column.cornerRadiusBottomRight = 5;
series.columns.template.column.cornerRadiusTopRight = 5;

var labelBullet = series.bullets.push(new am4charts.LabelBullet())
labelBullet.label.horizontalCenter = "center";
labelBullet.label.dx = 10;
labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#.0as')}";
labelBullet.locationX = 1;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function(fill, target){
  return chart.colors.getIndex(target.dataItem.index);
});

categoryAxis.sortBySeries = series;
chart.data = [
<?php 
$conexion123=conectar();

$sql123="SELECT v.valor valor, p.titulo seccion from preguntas p, valores v where v.preg_id=p.id 
and v.emp_email='$variable' and p.preg_seccion_id!=8 and p.preg_seccion_id!=9 and p.preg_seccion_id!=10 and p.preg_seccion_id=1";
$result123=mysqli_query($conexion123,$sql123);

		while($mostrar123=mysqli_fetch_array($result123))
		{
			//echo '{"country": "'.$mostrar123["preg_id"].'" , ';
			echo '{"network": "'.$mostrar123["seccion"].'" , ';
			echo ' "MAU": "'.$mostrar123["valor"].'" }, ';
		};
		 mysqli_close($conexion123);
		?>
];




}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv1" style="height:40%; width: 90%; 
position: relative;
	
	bottom:;
	left:200px;
	right:400px; 
	text-rendering: left;"></div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////-->

<h2 style="text-align: center; background-color: #FFF2CE">MÉTODOS DE TRABAJO</h2>
<h3 style="text-align: center; background-color: #E6FFBB">
<?php
$conexion123=conectar();
$sqlM="SELECT AVG(v.valor) valor from preguntas p, seccion s, valores v where v.preg_id=p.id and p.preg_seccion_id=s.id 
and v.emp_email='$variable' and s.id!=8 and s.id!=9 and s.id!=10  and p.preg_seccion_id=2";
$resultM=mysqli_query($conexion123,$sqlM);
while($mostrarM=mysqli_fetch_array($resultM))
		{
			print('').$mostrarM["valor"];
			print('</h3>');//echo '{"country": "'.$mostrar123["preg_id"].'" , ';

		};
		 mysqli_close($conexion123);
?>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_kelly);
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv2", am4charts.XYChart);
chart.padding(40, 40, 40, 40);
var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "network";
categoryAxis.renderer.minGridDistance = 1;
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.disabled = true;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "network";
series.dataFields.valueX = "MAU";
series.tooltipText = "{valueX.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.column.cornerRadiusBottomRight = 5;
series.columns.template.column.cornerRadiusTopRight = 5;

var labelBullet = series.bullets.push(new am4charts.LabelBullet())
labelBullet.label.horizontalCenter = "left";
labelBullet.label.dx = 10;
labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#.0as')}";
labelBullet.locationX = 1;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function(fill, target){
  return chart.colors.getIndex(target.dataItem.index);
});

categoryAxis.sortBySeries = series;
chart.data = [
<?php 
$conexion123=conectar();

$sql123="SELECT v.valor valor, p.titulo seccion from preguntas p, valores v where v.preg_id=p.id 
and v.emp_email='$variable' and p.preg_seccion_id!=8 and p.preg_seccion_id!=9 and p.preg_seccion_id!=10 and p.preg_seccion_id=2";
$result123=mysqli_query($conexion123,$sql123);

		while($mostrar123=mysqli_fetch_array($result123))
		{
			//echo '{"country": "'.$mostrar123["preg_id"].'" , ';
			echo '{"network": "'.$mostrar123["seccion"].'" , ';
			echo ' "MAU": "'.$mostrar123["valor"].'" }, ';
		};
		 mysqli_close($conexion123);
		?>
];




}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv2" style="height:40%; width: 90%; 
position: relative;
	
	bottom:;
	left:200px;
	right:400px;"></div>

<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////-->





<h2 style="text-align: center; background-color: #FFF2CE">MATERIA PRIMA</h2>
<h3 style="text-align: center; background-color: #E6FFBB">
<?php
$conexion123=conectar();
$sqlM="SELECT AVG(v.valor) valor from preguntas p, seccion s, valores v where v.preg_id=p.id and p.preg_seccion_id=s.id 
and v.emp_email='$variable' and s.id!=8 and s.id!=9 and s.id!=10  and p.preg_seccion_id=3";
$resultM=mysqli_query($conexion123,$sqlM);
while($mostrarM=mysqli_fetch_array($resultM))
		{
			print('').$mostrarM["valor"];
			print('</h3>');//echo '{"country": "'.$mostrar123["preg_id"].'" , ';

		};
		 mysqli_close($conexion123);
?>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_kelly);
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv3", am4charts.XYChart);
chart.padding(40, 40, 40, 40);

var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "network";
categoryAxis.renderer.minGridDistance = 1;
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.disabled = true;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "network";
series.dataFields.valueX = "MAU";
series.tooltipText = "{valueX.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.column.cornerRadiusBottomRight = 5;
series.columns.template.column.cornerRadiusTopRight = 5;

var labelBullet = series.bullets.push(new am4charts.LabelBullet())
labelBullet.label.horizontalCenter = "left";
labelBullet.label.dx = 10;
labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#.0as')}";
labelBullet.locationX = 1;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function(fill, target){
  return chart.colors.getIndex(target.dataItem.index);
});

categoryAxis.sortBySeries = series;
chart.data = [
<?php 
$conexion123=conectar();

$sql123="SELECT v.valor valor, p.titulo seccion from preguntas p, valores v where v.preg_id=p.id 
and v.emp_email='$variable' and p.preg_seccion_id!=8 and p.preg_seccion_id!=9 and p.preg_seccion_id!=10 and p.preg_seccion_id=3";
$result123=mysqli_query($conexion123,$sql123);

		while($mostrar123=mysqli_fetch_array($result123))
		{
			//echo '{"country": "'.$mostrar123["preg_id"].'" , ';
			echo '{"network": "'.$mostrar123["seccion"].'" , ';
			echo ' "MAU": "'.$mostrar123["valor"].'" }, ';
		};
		 mysqli_close($conexion123);
		?>
];




}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv3" style="height:40%; width: 90%; 
	
	position: relative;
	
	bottom:;
	left:200px;
	right:400px;"></div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
















<h2 style="text-align: center; background-color: #FFF2CE">MANO DE OBRA</h2>
<h3 style="text-align: center; background-color: #E6FFBB">
<?php
$conexion123=conectar();
$sqlM="SELECT AVG(v.valor) valor from preguntas p, seccion s, valores v where v.preg_id=p.id and p.preg_seccion_id=s.id 
and v.emp_email='$variable' and s.id!=8 and s.id!=9 and s.id!=10  and p.preg_seccion_id=4";
$resultM=mysqli_query($conexion123,$sqlM);
while($mostrarM=mysqli_fetch_array($resultM))
		{
			print('').$mostrarM["valor"];
			print('</h3>');//echo '{"country": "'.$mostrar123["preg_id"].'" , ';

		};
		 mysqli_close($conexion123);
?>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_kelly);
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv4", am4charts.XYChart);
chart.padding(40, 40, 40, 40);

var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "network";
categoryAxis.renderer.minGridDistance = 1;
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.disabled = true;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "network";
series.dataFields.valueX = "MAU";
series.tooltipText = "{valueX.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.column.cornerRadiusBottomRight = 5;
series.columns.template.column.cornerRadiusTopRight = 5;

var labelBullet = series.bullets.push(new am4charts.LabelBullet())
labelBullet.label.horizontalCenter = "left";
labelBullet.label.dx = 10;
labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#.0as')}";
labelBullet.locationX = 1;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function(fill, target){
  return chart.colors.getIndex(target.dataItem.index);
});

categoryAxis.sortBySeries = series;
chart.data = [
<?php 
$conexion123=conectar();

$sql123="SELECT v.valor valor, p.titulo seccion from preguntas p, valores v where v.preg_id=p.id 
and v.emp_email='$variable' and p.preg_seccion_id!=8 and p.preg_seccion_id!=9 and p.preg_seccion_id!=10 and p.preg_seccion_id=4";
$result123=mysqli_query($conexion123,$sql123);

		while($mostrar123=mysqli_fetch_array($result123))
		{
			//echo '{"country": "'.$mostrar123["preg_id"].'" , ';
			echo '{"network": "'.$mostrar123["seccion"].'" , ';
			echo ' "MAU": "'.$mostrar123["valor"].'" }, ';
		};
		 mysqli_close($conexion123);
		?>
];




}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv4" style="height:40%; width: 90%; position: relative;
	
	bottom:;
	left:200px;
	right:400px;"></div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////-->














<h2 style="text-align: center; background-color: #FFF2CE">MÉTRICAS</h2>
<h3 style="text-align: center; background-color: #E6FFBB">
<?php
$conexion123=conectar();
$sqlM="SELECT AVG(v.valor) valor from preguntas p, seccion s, valores v where v.preg_id=p.id and p.preg_seccion_id=s.id 
and v.emp_email='$variable' and s.id!=8 and s.id!=9 and s.id!=10  and p.preg_seccion_id=5";
$resultM=mysqli_query($conexion123,$sqlM);
while($mostrarM=mysqli_fetch_array($resultM))
		{
			print('').$mostrarM["valor"];
			print('</h3>');//echo '{"country": "'.$mostrar123["preg_id"].'" , ';

		};
		 mysqli_close($conexion123);
?>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_kelly);
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv5", am4charts.XYChart);
chart.padding(40, 40, 40, 40);

var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "network";
categoryAxis.renderer.minGridDistance = 1;
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.disabled = true;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "network";
series.dataFields.valueX = "MAU";
series.tooltipText = "{valueX.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.column.cornerRadiusBottomRight = 5;
series.columns.template.column.cornerRadiusTopRight = 5;

var labelBullet = series.bullets.push(new am4charts.LabelBullet())
labelBullet.label.horizontalCenter = "left";
labelBullet.label.dx = 10;
labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#.0as')}";
labelBullet.locationX = 1;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function(fill, target){
  return chart.colors.getIndex(target.dataItem.index);
});

categoryAxis.sortBySeries = series;
chart.data = [
<?php 
$conexion123=conectar();

$sql123="SELECT v.valor valor, p.titulo seccion from preguntas p, valores v where v.preg_id=p.id 
and v.emp_email='$variable' and p.preg_seccion_id!=8 and p.preg_seccion_id!=9 and p.preg_seccion_id!=10 and p.preg_seccion_id=5";
$result123=mysqli_query($conexion123,$sql123);

		while($mostrar123=mysqli_fetch_array($result123))
		{
			//echo '{"country": "'.$mostrar123["preg_id"].'" , ';
			echo '{"network": "'.$mostrar123["seccion"].'" , ';
			echo ' "MAU": "'.$mostrar123["valor"].'" }, ';
		};
		 mysqli_close($conexion123);
		?>
];




}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv5" style="height:40%; width: 90%; 
	position: relative;
	
	bottom:;
	left:200px;
	right:400px;"></div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////-->















<h2 style="text-align: center; background-color: #FFF2CE">MEDIO AMBIENTE</h2>
<h3 style="text-align: center; background-color: #E6FFBB">
<?php
$conexion123=conectar();
$sqlM="SELECT AVG(v.valor) valor from preguntas p, seccion s, valores v where v.preg_id=p.id and p.preg_seccion_id=s.id 
and v.emp_email='$variable' and s.id!=8 and s.id!=9 and s.id!=10  and p.preg_seccion_id=6";
$resultM=mysqli_query($conexion123,$sqlM);
while($mostrarM=mysqli_fetch_array($resultM))
		{
			print('').$mostrarM["valor"];
			print('</h3>');//echo '{"country": "'.$mostrar123["preg_id"].'" , ';

		};
		 mysqli_close($conexion123);
?>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_kelly);
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv6", am4charts.XYChart);
chart.padding(40, 40, 40, 40);

var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "network";
categoryAxis.renderer.minGridDistance = 1;
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.disabled = true;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "network";
series.dataFields.valueX = "MAU";
series.tooltipText = "{valueX.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.column.cornerRadiusBottomRight = 5;
series.columns.template.column.cornerRadiusTopRight = 5;

var labelBullet = series.bullets.push(new am4charts.LabelBullet())
labelBullet.label.horizontalCenter = "left";
labelBullet.label.dx = 10;
labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#.0as')}";
labelBullet.locationX = 1;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function(fill, target){
  return chart.colors.getIndex(target.dataItem.index);
});

categoryAxis.sortBySeries = series;
chart.data = [
<?php 
$conexion123=conectar();

$sql123="SELECT v.valor valor, p.titulo seccion from preguntas p, valores v where v.preg_id=p.id 
and v.emp_email='$variable' and p.preg_seccion_id!=8 and p.preg_seccion_id!=9 and p.preg_seccion_id!=10 and p.preg_seccion_id=6";
$result123=mysqli_query($conexion123,$sql123);

		while($mostrar123=mysqli_fetch_array($result123))
		{
			//echo '{"country": "'.$mostrar123["preg_id"].'" , ';
			echo '{"network": "'.$mostrar123["seccion"].'" , ';
			echo ' "MAU": "'.$mostrar123["valor"].'" }, ';
		};
		 mysqli_close($conexion123);
		?>
];




}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv6" style="height:40%; width: 90%; 
	position: relative;
	
	bottom:;
	left:200px;
	right:400px;"></div>
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
























<h2 style="text-align: center; background-color: #FFF2CE">MANAGMENT</h2>
<h3 style="text-align: center; background-color: #E6FFBB">
<?php
$conexion123=conectar();
$sqlM="SELECT AVG(v.valor) valor from preguntas p, seccion s, valores v where v.preg_id=p.id and p.preg_seccion_id=s.id 
and v.emp_email='$variable' and s.id!=8 and s.id!=9 and s.id!=10  and p.preg_seccion_id=7";
$resultM=mysqli_query($conexion123,$sqlM);
while($mostrarM=mysqli_fetch_array($resultM))
		{
			print('').$mostrarM["valor"];
			print('</h3>');//echo '{"country": "'.$mostrar123["preg_id"].'" , ';

		};
		 mysqli_close($conexion123);
?>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/kelly.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_kelly);
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv7", am4charts.XYChart);
chart.padding(40, 40, 40, 40);

var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.dataFields.category = "network";
categoryAxis.renderer.minGridDistance = 1;
categoryAxis.renderer.inversed = true;
categoryAxis.renderer.grid.template.disabled = true;

var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.min = 0;

var series = chart.series.push(new am4charts.ColumnSeries());
series.dataFields.categoryY = "network";
series.dataFields.valueX = "MAU";
series.tooltipText = "{valueX.value}"
series.columns.template.strokeOpacity = 0;
series.columns.template.column.cornerRadiusBottomRight = 5;
series.columns.template.column.cornerRadiusTopRight = 5;

var labelBullet = series.bullets.push(new am4charts.LabelBullet())
labelBullet.label.horizontalCenter = "left";
labelBullet.label.dx = 10;
labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#.0as')}";
labelBullet.locationX = 1;

// as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
series.columns.template.adapter.add("fill", function(fill, target){
  return chart.colors.getIndex(target.dataItem.index);
});

categoryAxis.sortBySeries = series;
chart.data = [
<?php 
$conexion123=conectar();

$sql123="SELECT v.valor valor, p.titulo seccion from preguntas p, valores v where v.preg_id=p.id 
and v.emp_email='$variable' and p.preg_seccion_id!=8 and p.preg_seccion_id!=9 and p.preg_seccion_id!=10 and p.preg_seccion_id=7";
$result123=mysqli_query($conexion123,$sql123);

		while($mostrar123=mysqli_fetch_array($result123))
		{
			//echo '{"country": "'.$mostrar123["preg_id"].'" , ';
			echo '{"network": "'.$mostrar123["seccion"].'" , ';
			echo ' "MAU": "'.$mostrar123["valor"].'" }, ';
		};
		 mysqli_close($conexion123);
		?>
];




}); // end am4core.ready()
</script>


<div id="chartdiv7" style="height:40%; width: 90%; 
	position: relative;
	
	bottom:;
	left:200px;
	right:400px;"></div>



<br>

	<div style="position: absolute;
							 left: 5px;
							 background-color: #E5E8E0;
							 margin: 10px,10px;">&copy;UBP - Desarrollado por 
						<a href="mailto:pablo_szu@hotmail.com" style="font-size: 18px;  color:#44426B;">&nbsp;Pablo Szulman</a>

				</div>
</body>