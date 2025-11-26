<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <!-- Enlace a la hoja de estilos CSS -->
    <link rel="stylesheet" href="css/ejercicio608.css">
</head>
<body>
    <!-- Título principal de la página -->
    <h1>Registro de Usuario</h1>

    <!-- Formulario de registro que envía datos a 608nuevoUsuario.php -->
    <form action="608nuevoUsuario.php" method="POST" onsubmit="return validarFormulario()">
        <div class="form-group">
            <label for="nombre">Nombre completo:</label>
            <input type="text" id="nombre" name="nombre" required>
            <div class="error" id="errorNombre"></div>
        </div>
        
        <div class="form-group">
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <div class="error" id="errorUsuario"></div>
        </div>
        
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <div class="error" id="errorPassword"></div>
        </div>
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <div class="error" id="errorEmail"></div>
        </div>
        
        <div class="form-group">
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" required>
                <option value="">Selecciona un rol</option>
                <option value="usuario">Usuario normal</option>
                <option value="administrador">Administrador</option>
            </select>
            <div class="error" id="errorRol"></div>
        </div>

        <!-- Botón para enviar el formulario -->
        <button type="submit">Registrar Usuario</button>
    </form>

    <!-- Enlace al archivo JavaScript -->
    <script src=js/608registro.js></script>

    <div class="nav-links">
        <a href="608listaUsuarios.php">Ver Usuarios Registrados</a>
    </div>
</body>
</html>