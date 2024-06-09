document.getElementById('registroForm').addEventListener('submit', function(event) {
    const correo = document.getElementById('correo').value;
    const contrasena = document.getElementById('contrasena').value;
    const nombre_completo = document.getElementById('nombre_completo').value;
    const usuario = document.getElementById('usuario').value;
    const errorCorreo = document.getElementById('correoError');
    const errorContrasena = document.getElementById('contrasenaError');
    const errorNombreCompleto = document.getElementById('nombreCompletoError');
    const errorUsuario = document.getElementById('usuarioError');

    errorCorreo.style.display = 'none';
    errorContrasena.style.display = 'none';
    errorNombreCompleto.style.display = 'none';
    errorUsuario.style.display = 'none';

    let isValid = true;

    if (!nombre_completo) {
        errorNombreCompleto.style.display = 'block';
        document.getElementById('nombre_completo').style.borderColor = 'red';
        isValid = false;
    } else {
        document.getElementById('nombre_completo').style.borderColor = '';
    }

    if (!correo) {
        errorCorreo.style.display = 'block';
        document.getElementById('correo').style.borderColor = 'red';
        isValid = false;
    } else {
        document.getElementById('correo').style.borderColor = '';
    }

    if (!usuario) {
        errorUsuario.style.display = 'block';
        document.getElementById('usuario').style.borderColor = 'red';
        isValid = false;
    } else {
        document.getElementById('usuario').style.borderColor = '';
    }

    if (!contrasena) {
        errorContrasena.style.display = 'block';
        document.getElementById('contrasena').style.borderColor = 'red';
        isValid = false;
    } else {
        document.getElementById('contrasena').style.borderColor = '';
    }

    if (!isValid) {
        event.preventDefault();
        return;
    }

    if (!validateEmail(correo)) {
        errorCorreo.textContent = 'Correo no válido';
        errorCorreo.style.display = 'block';
        document.getElementById('correo').style.borderColor = 'red';
        isValid = false;
    }

    if (!validateName(nombre_completo)) {
        errorNombreCompleto.textContent = 'El nombre completo no debe contener números ni caracteres especiales';
        errorNombreCompleto.style.display = 'block';
        document.getElementById('nombre_completo').style.borderColor = 'red';
        isValid = false;
    }

    if (!validateUsername(usuario)) {
        errorUsuario.textContent = 'El nombre de usuario no debe contener caracteres especiales';
        errorUsuario.style.display = 'block';
        document.getElementById('usuario').style.borderColor = 'red';
        isValid = false;
    }

    if (contrasena.length < 8 || !/[!@#$%^&*]/.test(contrasena) || !/\d/.test(contrasena) || !/[A-Z]/.test(contrasena) || !/[a-z]/.test(contrasena)) {
        errorContrasena.textContent = 'La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, una minúscula, un número y un carácter especial';
        errorContrasena.style.display = 'block';
        document.getElementById('contrasena').style.borderColor = 'red';
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
});

document.getElementById('loginForm').addEventListener('submit', function(event) {
    const correo = document.getElementById('loginCorreo').value;
    const contrasena = document.getElementById('loginContrasena').value;
    const errorLoginCorreo = document.getElementById('loginCorreoError');
    const errorLoginContrasena = document.getElementById('loginContrasenaError');
    const errorLogin = document.getElementById('loginError');

    errorLoginCorreo.style.display = 'none';
    errorLoginContrasena.style.display = 'none';
    errorLogin.style.display = 'none';

    let isValid = true;

    if (!correo) {
        errorLoginCorreo.style.display = 'block';
        document.getElementById('loginCorreo').style.borderColor = 'red';
        isValid = false;
    } else {
        document.getElementById('loginCorreo').style.borderColor = '';
    }

    if (!contrasena) {
        errorLoginContrasena.style.display = 'block';
        document.getElementById('loginContrasena').style.borderColor = 'red';
        isValid = false;
    } else {
        document.getElementById('loginContrasena').style.borderColor = '';
    }

    if (!isValid) {
        event.preventDefault();
        return;
    }

    if (!validateEmail(correo)) {
        errorLogin.textContent = 'Correo no válido';
        errorLogin.style.display = 'block';
        document.getElementById('loginCorreo').style.borderColor = 'red';
        event.preventDefault();
    }
});

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

function validateName(name) {
    const re = /^[a-zA-Z\s]+$/;
    return re.test(name);
}

function validateUsername(username) {
    const re = /^[a-zA-Z0-9]+$/;
    return re.test(username);
}
