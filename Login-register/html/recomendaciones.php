<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendaciones de Productos</title>
    <link rel="stylesheet" href="../css/recomendaciones.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a href="../php/formulario_objetivos.php">FORMULARIO</a>
            </div>
        </div>
    </nav>
    <!-- Fin del Navbar -->

    <header class="main-header">
        <img src="../imgs/pancakes.webp" alt="Fondo del encabezado">
        <div class="container">
            <h1>Los Mejores Productos</h1>
            <p>Según tu Objetivo</p>
        </div>
    </header>

    <main>
        <h1>Productos Recomendados</h1>
        <div class="tabs">
            <button class="tab-button active" data-category="proteinas">Proteínas</button>
            <button class="tab-button" data-category="carbohidratos">Carbohidratos</button>
            <button class="tab-button" data-category="grasas">Grasas</button>
            <button class="tab-button" data-category="extras">Extras</button>
        </div>
        <div id="mejores-productos" class="productos-container"></div>
    </main>

    <section class="newsletter">
        <div class="newsletter-content">
            <h2>Únete a nuestra newsletter para consejos exclusivos</h2>
            <br>
            <form action="#" method="post">
                <input type="email" name="email" placeholder="Introduzca su correo" required>
                <button type="submit">Suscríbete</button>
            </form>
        </div>
    </section>

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
    <!-- End of .container -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const objetivo = urlParams.get('objetivo');
            const intolerancia = urlParams.get('intolerancia_lactosa');
            const intoleranciaGluten = urlParams.get('intolerancia_gluten');
            const tipoDieta = urlParams.get('tipo_dieta');

            function fetchProductos(categoria) {
                fetch(`../php/mostrar_alimentos_recomendados.php?objetivo=${objetivo}&intolerancia_lactosa=${intolerancia}&intolerancia_gluten=${intoleranciaGluten}&tipo_dieta=${tipoDieta}&categoria=${categoria}`)
                    .then(response => response.json())
                    .then(data => {
                        const contenedor = document.getElementById('mejores-productos');
                        contenedor.innerHTML = '';
                        if (data.error) {
                            contenedor.innerHTML = `<p>Error: ${data.error}</p>`;
                        } else {
                            data.forEach(producto => {
                                const productoDiv = document.createElement('div');
                                const imagenClase = (producto.nombre === 'Crema de arroz' || producto.nombre === 'Cereal Mix') ? 'ajustada' : '';
                                productoDiv.className = 'producto';
                                productoDiv.innerHTML = `
                                    <div class="producto-imagen ${imagenClase}">
                                        <img src="${producto.imagen}" alt="${producto.nombre}">
                                        <div class="producto-hover">
                                            <h3>${producto.hover_text}</h3>
                                        </div>
                                    </div>
                                    <div class="producto-detalle">
                                        <h2>${producto.nombre}</h2>
                                        <p class="descripcion">${producto.descripcion}</p>
                                        <p class="marca">Marca: ${producto.marca}</p>
                                        <p class="precio">€${producto.precio}</p>
                                    </div>
                                `;
                                contenedor.appendChild(productoDiv);
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching the data:', error);
                    });
            }

            // Fetch initial products
            fetchProductos('proteinas');

            // Handle tab button clicks
            document.querySelectorAll('.tab-button').forEach(button => {
                button.addEventListener('click', function() {
                    document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    fetchProductos(this.getAttribute('data-category'));
                });
            });
        });
    </script>
</body>
</html>
