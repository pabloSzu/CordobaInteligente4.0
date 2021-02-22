<?php
include ('../conexion.php');
    $conexion=conectar();



   $sql="INSERT INTO datos(Email,Razon_Social,Localidad,cant_emp,sector,pers) 

   							VALUES('".$_POST["Email"]."' ,
								   '".$_POST["RazonSocial"]."' ,
								   '".$_POST["Localidad"]."',
								   '".$_POST["CantEmp"]."' , 
								   '".$_POST["sector"]."' ,
								   '".$_POST["NomyAp"]."')";

    $resultado=mysqli_query($conexion,$sql) or die ('Error en el query');


 mysqli_close($conexion);
 
?>

<meta http-equiv="refresh" content="0; ../index.php">