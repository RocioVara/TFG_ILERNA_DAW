<?php
include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$rol = 'usuario';

// Cifrar la contraseña antes de guardarla en la base de datos
$contrasena_hashed = password_hash($contrasena, PASSWORD_DEFAULT);

$query = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena, rol)
          VALUES ('$nombre_completo', '$correo', '$usuario', '$contrasena_hashed', '$rol')";

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo '
    <script>
        alert("Usuario almacenado exitosamente");
        window.location = "../index.php";
    </script>
    ';
} else {
    echo '
    <script>
        alert("Inténtalo de nuevo, usuario no almacenado");
        window.location = "../index.php";
    </script>
    ';
}

mysqli_close($conexion);
?>
