<?php
// Lista de colores disponibles
$colores = [
    'white' => 'Blanco',
    'red' => 'Rojo',
    'green' => 'Verde',
    'blue' => 'Azul',
    'yellow' => 'Amarillo',
    'gray' => 'Gris'
];

// Si el usuario selecciona un color, guardamos la cookie
if (isset($_POST['color'])) {
    $colorSeleccionado = $_POST['color'];
    setcookie('fondo', $colorSeleccionado, time() + 86400); // 24 horas
} elseif (isset($_COOKIE['fondo'])) {
    $colorSeleccionado = $_COOKIE['fondo'];
} else {
    $colorSeleccionado = 'white'; // Color por defecto
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Selecciona el color de fondo</title>
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
</body>
</html>