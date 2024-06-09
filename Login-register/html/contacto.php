<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="../css/recomendaciones.css">
    <link rel="stylesheet" href="../css/contacto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-logo">
                <img src="../imgs/logoTFG.png" alt="Logo">
            </div>
            <div class="navbar-links">
                <a href="../html/recomendaciones.php">HOME</a>
                <span>|</span>
                <a href="../html/contacto.php">CONTACTO</a>
                <span>|</span>
                <a href="../html/formulario_objetivos.php">FORMULARIO</a>
            </div>
        </div>
    </nav>
    <!-- Fin del Navbar -->
    <main id="main-content">
        <!-- Contenido de la página de contacto -->
        <div class="contacto">
            <h2>Contacta con Nosotros</h2>
            <form>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" required></textarea>
                
                <button type="submit">Enviar</button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                    <!-- TikTok -->
                 <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button"><i class="fab fa-tiktok"></i></a>
         
                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button"><i class="fab fa-instagram"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Copyright:
            <a class="text-white" href="https://Nutriware.com/">Nutriware.com</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>
</html>
