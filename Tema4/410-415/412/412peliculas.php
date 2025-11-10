<?php
// 412peliculas.php - Vista del listado de películas
session_start();

// Verificar que el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    header('Location: ../410/410index.php');
    exit;
}

// Obtener películas desde la sesión
$peliculas = $_SESSION['peliculas'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Películas</title>
</head>
<body>
    <h1>Listado de Películas</h1>
    
    <nav>
    <a href="412peliculas.php">Ver Películas</a> | 
    <a href="../414/414series.php">Ver Series</a> |
    <a href="../413/413logout.php">Cerrar Sesión</a>
</nav>
    
    <ul>
        <?php
        // Recorrer y mostrar todas las películas del array
        foreach ($peliculas as $pelicula) {
            echo "<li>$pelicula</li>";
        }
        ?>
    </ul>
</body>
</html>