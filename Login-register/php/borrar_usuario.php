<?php
include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Consulta SQL para eliminar un usuario por su ID
    $query = "DELETE FROM usuarios WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_usuario);
        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Redirigir a la página de listado_usuarios después de borrar exitosamente
            header('Location: listado_usuarios.php');
            exit(); // Asegurarse de que se detiene la ejecución después de la redirección
        } else {
            echo '<script>alert("Error al borrar el usuario"); window.location = "listado_usuarios.php";</script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }
} else {
    echo "Parámetros incorrectos para borrar el usuario.";
}
?>
