<?php
// conexion registro usuarios
$conexion = mysqli_connect("localhost", "root", "", "login_register_db");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>


<!-- /* Comprobar que funciona bien

if($conexion){
    echo 'Conectado exitosamente a la BBDD';
}else{
    echo 'No se ha podido conectar a la BBDD';
}
*/ -->