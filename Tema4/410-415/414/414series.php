<?php
// 414series.php - Vista del listado de series
session_start();

// Verificar que el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: ../410/410index.php');
    exit;
}

// Obtener series desde la sesión
$series = $_SESSION['series'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Series</title>
</head>
<body>
    <h1>Listado de Series</h1>
    
    <nav>
        <a href="412peliculas.php">Ver Películas</a> | 
        <a href="414series.php">Ver Series</a> |
        <a href="413logout.php">Cerrar Sesión</a>
    </nav>
    
    <ul>
        <?php
        // Recorrer y mostrar todas las series del array
        foreach ($series as $serie) {
            echo "<li>$serie</li>";
        }
        ?>
    </ul>
</body>
</html>