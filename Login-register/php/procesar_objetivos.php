<?php
// Incluir el archivo de conexión a la base de datos de nutrición
include 'conexion_nutricion.php'; // Incluir la conexión a la base de datos de nutrición

// Verificar si se ha enviado un formulario por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha seleccionado un objetivo
    if (isset($_POST["objetivo"])) {
        // Obtener el objetivo seleccionado del formulario
        $objetivo = $_POST["objetivo"];

        // Aquí puedes realizar la lógica para determinar qué alimentos recomendar
        // dependiendo del objetivo seleccionado.
        
        // Por ahora, solo vamos a registrar el objetivo en la base de datos de nutrición como ejemplo
        $query = "INSERT INTO objetivos (nombre) VALUES (?)";
        $stmt = mysqli_prepare($conexion_nutricion, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $objetivo);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "El objetivo se ha registrado correctamente en la base de datos de nutrición.";
            } else {
                echo "Error al registrar el objetivo en la base de datos de nutrición.";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error en la consulta: " . mysqli_error($conexion_nutricion);
        }
        
        // Redireccionar a una página que muestre los alimentos recomendados
        header("Location: mostrar_alimentos_recomendados.php?objetivo=$objetivo");
        exit();
    } else {
        // Si no se ha seleccionado un objetivo, muestra un mensaje de error
        echo "No se ha seleccionado un objetivo.";
    }
} else {
    // Si se intenta acceder a este archivo directamente sin enviar datos del formulario, redirige con un mensaje de error
    echo "Error: Acceso no autorizado.";
}

// Cierra la conexión a la base de datos al finalizar
mysqli_close($conexion_nutricion);
?>
