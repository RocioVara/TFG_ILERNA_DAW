<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Usuario</title>
    <link rel="stylesheet" href="../css/estilos_alta.css">
</head>
<body>
    <h1>Alta de Usuario</h1>
    <form action="crear_usuario.php" method="POST">
        <label for="nombre_completo">Nombre completo:</label><br>
        <input type="text" id="nombre_completo" name="nombre_completo" required><br><br>
        <label for="correo">Correo electrónico:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>
        <label for="usuario">Nombre de usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" value="Registrar usuario">
    </form>
    <div class="botones-extra">
        <a href="../php/bienvenida.php" class="boton">Ir a Bienvenida</a>
        <a href="listado_usuarios.php" class="boton">Listado Usuarios</a>
    </div>
</body>
</html>
