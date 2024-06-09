<?php
include 'conexion_be.php';

// Consulta SQL para obtener la lista de usuarios incluyendo la contraseña
$query = "SELECT id, nombre_completo, correo, usuario, contrasena FROM usuarios";
$resultado = mysqli_query($conexion, $query);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    echo '<h1>Listado de Usuarios</h1>';
    echo '<table>';
    echo '<tr><th>ID</th><th>Nombre Completo</th><th>Correo</th><th>Usuario</th><th>Contraseña</th><th>Acciones</th></tr>';

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<tr>';
        echo '<td>' . $fila['id'] . '</td>';
        echo '<td>' . $fila['nombre_completo'] . '</td>';
        echo '<td>' . $fila['correo'] . '</td>';
        echo '<td>' . $fila['usuario'] . '</td>';
        echo '<td>' . substr($fila['contrasena'], 0, 10) . '...</td>';
        echo '<td class="actions">';
        echo '<a href="borrar_usuario.php?id=' . $fila['id'] . '" class="boton boton-accion borrar">Borrar</a>';
        echo '<a href="modificar_usuario.php?id=' . $fila['id'] . '" class="boton boton-accion modificar">Modificar</a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No hay usuarios para mostrar.';
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="../css/estilos_listado.css">
</head>
<body>
    <div class="navbar">
        <a href="cerrar_sesion.php" class="boton">Cerrar Sesión</a>
        <a href="alta_usuario.php" class="boton">Alta Usuario</a>
    </div>
</body>
</html>
