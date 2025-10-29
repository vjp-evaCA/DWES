<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['nConvivientes'] = $_POST['nConvivientes'] ?? '0';
    $_SESSION['aficiones'] = $_POST['aficiones'] ?? [];
    $_SESSION['menuFav'] = $_POST['menuFav'] ?? [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen del formulario</title>
</head>
<body>
    <h2>Resumen del formulario</h2>
    <ul>
        <li><strong>Nombre completo:</strong> <?php echo htmlspecialchars($_SESSION['nombreCompleto'] ?? ''); ?></li>
        <li><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?></li>
        <li><strong>URL página personal:</strong> <?php echo htmlspecialchars($_SESSION['url'] ?? ''); ?></li>
        <li><strong>Sexo:</strong> <?php echo htmlspecialchars($_SESSION['sexo'] ?? ''); ?></li>
        <li><strong>Número de convivientes:</strong> <?php echo htmlspecialchars($_SESSION['nConvivientes'] ?? '0'); ?></li>
        <li><strong>Aficiones:</strong>
            <?php
            echo empty($_SESSION['aficiones']) ? 'Ninguna' : htmlspecialchars(implode(', ', $_SESSION['aficiones']));
            ?>
        </li>
        <li><strong>Menú favorito:</strong>
            <?php
            echo empty($_SESSION['menuFav']) ? 'Ninguno' : htmlspecialchars(implode(', ', $_SESSION['menuFav']));
            ?>
        </li>
    </ul>
    <a href="409formulario1.php">Volver al inicio</a>
</body>
</html>