<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo '
    <script>
        alert("Por favor, inicia sesión");
        window.location = "../index.php";
    </script>
    ';
    session_destroy();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="../css/estilos_bienvenida.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <header class="encabezado">
        <div class="logo-centrado">
            <img src="../imgs/logoTFG.png" alt="Logo">
        </div>
    </header>
    <main>
        <div class="contenedor">
            <div class="seccion-admin">
                <h2>Admin Panel</h2>
                <a href="listado_usuarios.php" class="boton">Listar usuarios</a>
                <a href="alta_usuario.php" class="boton">Alta usuario</a>
            </div>
            <div class="seccion-usuario">
                <h2>Usuario</h2>
                <a href="formulario_objetivos.php" class="boton">Formulario</a>
            </div>
        </div>
        <div class="contenedor-cerrar-sesion">
            <a href="../php/cerrar_sesion.php" class="boton-cerrar-sesion">Cerrar Sesión</a>
        </div>
    </main>
</body>
</html>
