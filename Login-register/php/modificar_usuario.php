<?php
include 'conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id_usuario = $_GET['id'];

    // Consulta SQL para obtener los datos del usuario por su ID
    $query = "SELECT nombre_completo, correo, usuario FROM usuarios WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_usuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $nombre_completo, $correo, $usuario);
        mysqli_stmt_fetch($stmt);

        if ($nombre_completo) {
            // Título fuera del contenedor
            echo '<h1>Modificar Usuario</h1>';
            // Formulario para modificar los datos del usuario
            echo '<div class="container">';
            echo '<form action="actualizar_usuario.php" method="POST">';
            echo '<input type="hidden" name="id" value="' . $id_usuario . '">';
            echo '<label for="nombre_completo">Nombre completo:</label>';
            echo '<input type="text" id="nombre_completo" name="nombre_completo" value="' . $nombre_completo . '" required><br>';
            echo '<label for="correo">Correo electrónico:</label>';
            echo '<input type="email" id="correo" name="correo" value="' . $correo . '" required><br>';
            echo '<label for="usuario">Nombre de usuario:</label>';
            echo '<input type="text" id="usuario" name="usuario" value="' . $usuario . '" required><br>';
            echo '<input type="submit" value="Actualizar" class="boton">';
            echo '</form>';
            echo '</div>';
        } else {
            echo "Usuario no encontrado.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }
} else {
    echo "Parámetros incorrectos para modificar el usuario.";
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="../css/estilos_modificar.css">
</head>
<body>
    <a href="listado_usuarios.php" class="boton volver">Volver</a>
</body>
</html>
