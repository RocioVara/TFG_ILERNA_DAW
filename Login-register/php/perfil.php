<?php
session_start();
if(!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'administrador'){
    header("Location: bienvenida.php"); // Redirigir al inicio de sesión si no es administrador
    exit();
}

// Incluir la conexión a la base de datos
include("conexion_be.php"); // Reemplaza esto con el archivo que contenga la conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario de actualización
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nuevo_correo = $_POST['nuevo_correo'];
    $nuevo_usuario = $_POST['nuevo_usuario'];
    $id_usuario = $_SESSION['id_usuario']; // Suponiendo que tienes el ID del usuario en la sesión

    // Consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE usuarios SET nombre_completo = '$nuevo_nombre', correo = '$nuevo_correo', usuario = '$nuevo_usuario' WHERE id = $id_usuario";

    if ($conn->query($sql) === TRUE) {
        echo "Datos actualizados correctamente";
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfil de usuario</title>
    <!-- Agrega tus estilos y enlaces a CSS si es necesario -->
</head>
<body>
    <h1>Perfil de Usuario</h1>
    <form action="modificar_usuario.php" method="POST">
        <label for="nuevo_nombre">Nuevo Nombre:</label>
        <input type="text" name="nuevo_nombre" required><br>
        
        <label for="nuevo_correo">Nuevo Correo:</label>
        <input type="text" name="nuevo_correo" required><br>
        
        <label for="nuevo_usuario">Nuevo Usuario:</label>
        <input type="text" name="nuevo_usuario" required><br>
        
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
