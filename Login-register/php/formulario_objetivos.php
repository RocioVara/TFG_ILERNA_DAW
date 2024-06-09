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
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
     <!-- Navbar -->
     <nav class="navbar">
        
        <div class="navbar-links">
            <a href="../index.php">VOLVER</a>
        </div>
    </nav>
    <!-- Fin del Navbar -->
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-info">
                    <div class="logo">
                        <img src="../imgs/logoTFG.png" alt="Logo">
                    </div>
                    <h3>Hacer la compra nunca fue tan sencillo y saludable</h3>
                    <p></p>
                </div>
            </div>

            <div class="contenedor__formulario">
                <h2>Formulario</h2>
                <form action="../html/recomendaciones.php" method="GET" class="formulario__objetivos">
                    <fieldset>
                        <legend>¿Cuál es tu objetivo?</legend>
                        <label for="perdida_grasa">
                            <input type="radio" id="perdida_grasa" name="objetivo" value="1" required>
                            Pérdida de grasa
                        </label>
                        <label for="aumento_masa_muscular">
                            <input type="radio" id="aumento_masa_muscular" name="objetivo" value="2" required>
                            Aumento de masa muscular
                        </label>
                    </fieldset>
                    
                    <fieldset>
                        <legend>¿Tienes intolerancia a la lactosa?</legend>
                        <label for="intolerancia_si">
                            <input type="radio" id="intolerancia_si" name="intolerancia_lactosa" value="1" required>
                            Sí
                        </label>
                        <label for="intolerancia_no">
                            <input type="radio" id="intolerancia_no" name="intolerancia_lactosa" value="0" required>
                            No
                        </label>
                    </fieldset>

                    <fieldset>
                        <legend>¿Tienes intolerancia al gluten?</legend>
                        <label for="gluten_si">
                            <input type="radio" id="gluten_si" name="intolerancia_gluten" value="1" required>
                            Sí
                        </label>
                        <label for="gluten_no">
                            <input type="radio" id="gluten_no" name="intolerancia_gluten" value="0" required>
                            No
                        </label>
                    </fieldset>

                    <fieldset>
                        <legend>¿Cuál se ajusta a tu tipo de dieta actual?</legend>
                        <label for="vegana">
                            <input type="radio" id="vegana" name="tipo_dieta" value="vegana" required>
                            Vegana
                        </label>
                        <label for="vegetariana">
                            <input type="radio" id="vegetariana" name="tipo_dieta" value="vegetariana" required>
                            Vegetariana
                        </label>
                        <label for="sin_particularidades">
                            <input type="radio" id="sin_particularidades" name="tipo_dieta" value="sin_particularidades" required>
                            Sin particularidades
                        </label>
                    </fieldset>

                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
