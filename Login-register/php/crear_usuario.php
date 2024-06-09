<?php
include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    // Encriptar la contraseña (puedes usar hash('sha512', $contrasena) u otros métodos más seguros)

    $contrasena_encriptada = hash('sha512', $contrasena);

    // Consulta SQL para insertar un nuevo usuario
    $query = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $nombre_completo, $correo, $usuario, $contrasena_encriptada);
        mysqli_stmt_execute($stmt);
        $filas_afectadas = mysqli_stmt_affected_rows($stmt);

        if ($filas_afectadas > 0) {
            echo '<script>alert("Usuario registrado correctamente"); window.location = "alta_usuario.php";</script>';
        } else {
            echo '<script>alert("Error al registrar el usuario"); window.location = "alta_usuario.php";</script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }
}
?>

