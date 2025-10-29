<?php
session_start();

if (isset($_GET['vaciar'])) {
    session_unset();
    header('Location: 408fondoSesion1.php');
    exit;
}

$color = isset($_SESSION['fondo']) ? $_SESSION['fondo'] : 'white';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Color de fondo seleccionado</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($color); ?>;">
    <p>El color de fondo actual es: <strong><?php echo htmlspecialchars($color); ?></strong></p>
    <a href="408fondoSesion1.php">Volver a la página anterior</a>
    <br>
    <a href="408fondoSesion2.php?vaciar=1">Vaciar sesión y volver</a>
</body>
</html>