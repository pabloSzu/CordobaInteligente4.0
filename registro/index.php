<?php
include ('../conexion.php');

    $conexionr=conectar();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registro</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<!--/////////////////////////////////////////////////////////////////validacio-->


<!--//////////////////////////////////////////////////////////////////////////////-->





<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins" >
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Datos a completar</h2>

<script>
function validateForm1() {
  var x1 = document.forms["reg"]["Email"].value;
  
    <?php
    $sqla="SELECT * from datos";
    $resulta=mysqli_query($conexionr,$sqla);
    while($mostrara=mysqli_fetch_array($resulta))
        {
            //echo '{"country": "'.$mostrar123["preg_id"].'" , ';
        print('if (x1 =="').$mostrara["Email"];
        print('"){    
        alert("El Email ya existe");
        return false;
  }');
        };
        ?>     
}
</script>
                    <form name="reg" action="registrar_datos.php" method="POST" onsubmit="return validateForm1()">



                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="text" name="Email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Razón Social</label>
                                    <input class="input--style-4" type="text" name="RazonSocial" required>
                                </div>
                            </div>
                            
                             <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Localidad</label>
                                    <input class="input--style-4" type="text" name="Localidad" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Cantidad de Empleados</label>
                                    <input class="input--style-4" type="text" name="CantEmp" required>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nombre y Apellido</label>
                                    <input class="input--style-4" type="text" name="NomyAp" required>
                                </div>
                            </div>


</div>
<br>
<div >
 <?php                                   
$sql="SELECT * from sector";
$result=mysqli_query($conexionr,$sql);
        print('<p><h4>  Sector: </h4><br>');
        while($mostrar=mysqli_fetch_array($result)){
        
        print( ' <input class="row row-space" type="radio" name="sector" required value=" ').$mostrar['id'];
        print('">').$mostrar['sector_desc'];
        print('</p></p><br>');
};
         mysqli_close($conexionr);
?>
</div>
 
                    
                        
                    
                        <div class="p-t-15">
                          <!--  <a href="../Login/index.html"> <button class="btn btn--radius-2 btn--blue" type="submit" >Registrar</button></a>  --> 
                          <button href="../Login/index.php" class="btn btn--radius-2 btn--blue"  style="text-decoration: none;">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div style="position: absolute;
                             left: 5px;

                             margin: 10px,10px;">&copy;UBP - Desarrollado por 
                        <a href="mailto:pablo_szu@hotmail.com" style="font-size: 17px;">

                        &nbsp;Pablo Szulman

                    </a>

                </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>




</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->

<style type="text/css">
    a:hover { border: 1px solid #000;
    background-color: #B5B5BF ;
    border-radius: 10%;
    }
</style>