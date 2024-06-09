document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector(".contacto form");

    // Agrega un escuchador de eventos para el envío del formulario
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Previene el envío del formulario

  // Obtiene los valores de los campos del formulario

        const nombre = document.getElementById("nombre").value;
        const email = document.getElementById("email").value;
        const mensaje = document.getElementById("mensaje").value;

        // Realiza una validación simple para asegurarse de que todos los campos estén completos
        if (nombre && email && mensaje) {
            // Muestra un mensaje de éxito
            alert("¡Gracias por tu mensaje! Nos pondremos en contacto contigo pronto.");
            
            // Limpia los campos del formulario
            form.reset();
        } else {
            // Muestra un mensaje de error
            alert("Por favor, completa todos los campos.");
        }
    });
});
