<?php
// Inicio de sesión
session_start();

// Verifico que el usuario tiene la sesión activa
if (!isset($_SESSION['usuario'])) {
    header('Location: ../410/410index.php');
    exit;
}

// Obtenengo el array de las series 
$series = $_SESSION['series'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 414</title>
</head>

<body>
    <h1>Lista de series</h1>

    <!-- Menú de navegación entre los diferentes archivos -->
    <nav>
        <a href="../412/412peliculas.php">Ver Películas</a> |
        <a href="414series.php">Ver Series</a> |
        <a href="../413/413logout.php">Cerrar Sesión</a>
    </nav>

    <ul>
        <?php
        // Recorro y muestro todas las series del array
        foreach ($series as $serie) {
            echo "<li>$serie</li>";
        }
        ?>
    </ul>
</body>

</html>