document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registroForm');

    form.addEventListener('submit', function (event) {
        if (!validarFormulario()) {
            event.preventDefault();
        }
    });

    // Validación en tiempo real
    const inputs = form.querySelectorAll('input, select');
    inputs.forEach(input => {
        input.addEventListener('blur', function () {
            validarCampo(this);
        });

        input.addEventListener('input', function () {
            // Limpiar error cuando el usuario empiece a escribir
            if (this.value.trim() !== '') {
                const errorElement = document.getElementById('error' + this.name.charAt(0).toUpperCase() + this.name.slice(1));
                if (errorElement) {
                    errorElement.textContent = '';
                }
            }
        });
    });
});

function validarFormulario() {
    let isValid = true;

    // Limpiar errores anteriores
    document.querySelectorAll('.error').forEach(error => error.textContent = '');

    // Validar cada campo
    const nombre = document.getElementById('nombre');
    const usuario = document.getElementById('usuario');
    const password = document.getElementById('password');
    const email = document.getElementById('email');
    const rol = document.getElementById('rol');

    if (!validarCampo(nombre)) isValid = false;
    if (!validarCampo(usuario)) isValid = false;
    if (!validarCampo(password)) isValid = false;
    if (!validarCampo(email)) isValid = false;
    if (!validarCampo(rol)) isValid = false;

    return isValid;
}

function validarCampo(campo) {
    const valor = campo.value.trim();
    const errorElement = document.getElementById('error' + campo.name.charAt(0).toUpperCase() + campo.name.slice(1));

    if (!errorElement) return true;

    switch (campo.name) {
        case 'nombre':
            if (valor === '') {
                errorElement.textContent = 'El nombre es obligatorio';
                return false;
            }
            break;

        case 'usuario':
            if (valor === '') {
                errorElement.textContent = 'El usuario es obligatorio';
                return false;
            } else if (valor.length < 3) {
                errorElement.textContent = 'El usuario debe tener al menos 3 caracteres';
                return false;
            }
            break;

        case 'password':
            if (valor === '') {
                errorElement.textContent = 'La contraseña es obligatoria';
                return false;
            } else if (valor.length < 6) {
                errorElement.textContent = 'La contraseña debe tener al menos 6 caracteres';
                return false;
            }
            break;

        case 'email':
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (valor === '') {
                errorElement.textContent = 'El email es obligatorio';
                return false;
            } else if (!emailRegex.test(valor)) {
                errorElement.textContent = 'El formato del email no es válido';
                return false;
            }
            break;

        case 'rol':
            if (valor === '') {
                errorElement.textContent = 'Debes seleccionar un rol';
                return false;
            }
            break;
    }

    return true;
}