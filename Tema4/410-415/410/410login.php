<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 410 - Login</title>
</head>

<body>
    <h1>Iniciar sesión</h1>

    <!-- Mostramos mensaje de error si el usuario o la contraseña son incorrectas -->
    <?php if (isset($_GET['error'])): ?>
        <p>ERROR: El usuario o la contraseña es incorrecto</p>
    <?php endif; ?>

    <!-- Formulario de inicio de sesión -->
    <form action="../411/411login.php" method="POST">
        <p>
            <!-- Nombre de usuario -->
            <label>Usuario:</label>
            <input type="text" name="usuario" required>
        </p>
        <p>
            <!-- Contraseña -->
            <label>Contraseña:</label>
            <input type="password" name="contrasena" required>
        </p>
        <input type="submit" value="Entrar">
    </form>
</body>

</html>