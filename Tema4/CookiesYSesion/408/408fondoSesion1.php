<?php
session_start();

// Lista de colores disponibles
$colores = [
    'white' => 'Blanco',
    'red' => 'Rojo',
    'green' => 'Verde',
    'blue' => 'Azul',
    'yellow' => 'Amarillo',
    'gray' => 'Gris'
];

// Si el usuario selecciona un color, lo guardamos en la sesión
if (isset($_POST['color'])) {
    $_SESSION['fondo'] = $_POST['color'];
}

$colorSeleccionado = isset($_SESSION['fondo']) ? $_SESSION['fondo'] : 'white';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Selecciona el color de fondo (Sesión)</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($colorSeleccionado); ?>;">
    <form method="post">
        <label for="color">Elige un color de fondo:</label>
        <select name="color" id="color">
            <?php
            foreach ($colores as $valor => $nombre) {
                $selected = ($colorSeleccionado == $valor) ? 'selected' : '';
                echo "<option value=\"$valor\" $selected>$nombre</option>";
            }
            ?>
        </select>
        <input type="submit" value="Cambiar color">
    </form>
    <br>
    <a href="408fondoSesion2.php">Ir a la siguiente página</a>
</body>
</html>