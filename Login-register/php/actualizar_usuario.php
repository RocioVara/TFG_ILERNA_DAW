<?php
include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id'];
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];

    // Consulta SQL para actualizar los datos del usuario
    $query = "UPDATE usuarios SET nombre_completo = ?, correo = ?, usuario = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssi", $nombre_completo, $correo, $usuario, $id_usuario);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo '<script>alert("Usuario actualizado correctamente"); window.location = "listado_usuarios.php";</script>';
        } else {
            echo '<script>alert("Error al actualizar el usuario"); window.location = "listado_usuarios.php";</script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }
} else {
    echo "Parámetros incorrectos para actualizar el usuario.";
}

mysqli_close($conexion);
?>
