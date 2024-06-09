<?php
session_start();
include 'conexion_be.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$query = "SELECT * FROM usuarios WHERE correo='$correo'";
$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($contrasena, $row['contrasena'])) {
        $_SESSION['usuario'] = $row['usuario'];
        header("location: bienvenida.php");
        exit();
    } else {
        echo '
        <script>
            alert("Contraseña incorrecta");
            window.location = "../index.php";
        </script>
        ';
    }
} else {
    echo '
    <script>
        alert("El correo no está registrado");
        window.location = "../index.php";
    </script>
    ';
}
?>
