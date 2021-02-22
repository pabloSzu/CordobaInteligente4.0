<?php
function conectar(){
    $conexion=mysqli_connect('localhost','root','','formulario') or die ('Error en la base de datos');
    return $conexion;
};
?>

