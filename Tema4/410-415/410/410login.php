<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>

<body>
    <h1>Iniciar Sesión</h1>

    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;">Error: Usuario o contraseña incorrectos</p>
    <?php endif; ?>

    <form action="../411/411login.php" method="POST">
        <p>
            <label>Usuario:</label>
            <input type="text" name="usuario" required>
        </p>
        <p>
            <label>Contraseña:</label>
            <input type="password" name="password" required>
        </p>
        <input type="submit" value="Entrar">
    </form>
</body>

</html>