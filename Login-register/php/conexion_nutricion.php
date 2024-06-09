<?php
//  conexion productos recomendados

$conexion_nutricion = mysqli_connect("localhost", "root", "", "nutricion_db");

///////////////////////////////////////////////////////////////

if (!$conexion_nutricion) {
    die("Error de conexión con la base de datos de nutrición: " . mysqli_connect_error());
}
?>
