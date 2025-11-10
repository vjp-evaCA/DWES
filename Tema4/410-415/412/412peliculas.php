<?php
// Inicio de sesión
session_start();

// Verifico que el usuario tenga la sesión activa
if (!isset($_SESSION['usuario'])) {
    header('Location: ../410/410index.php');
    exit;
}

// Obtengo el array de las películas
$peliculas = $_SESSION['peliculas'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 412</title>
</head>

<body>
    <h1>Lista de películas</h1>

    <!-- Menú de navegación entre los diferentes archivos -->
    <nav>
        <a href="412peliculas.php">Ver Películas</a> |
        <a href="../414/414series.php">Ver Series</a> |
        <a href="../413/413logout.php">Cerrar Sesión</a>
    </nav>

    <ul>
        <?php
        // Recorro y muestro todas las películas del array
        foreach ($peliculas as $pelicula) {
            echo "<li>$pelicula</li>";
        }
        ?>
    </ul>
</body>

</html>