<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['nombreCompleto'] = $_POST['nombreCompleto'] ?? '';
    $_SESSION['email'] = $_POST['email'] ?? '';
    $_SESSION['url'] = $_POST['url'] ?? '';
    $_SESSION['sexo'] = $_POST['sexo'] ?? '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario paso 2</title>
</head>
<body>
    <h1>Formulario (Paso 2 de 2)</h1>
    <form action="409formulario3.php" method="post">
        <label for='nConvivientes'>Número de convivientes en el domicilio:</label><br />
        <input type='number' name='nConvivientes' id='nConvivientes' min="0" max="20" value="0" /><br /><br />

        <label>Aficiones:</label><br />
        <input type='checkbox' name='aficiones[]' id='lectura' value='Lectura' />
        <label for='lectura'>Leer</label>
        <input type='checkbox' name='aficiones[]' id='deporte' value='Deporte' />
        <label for='deporte'>Hacer deporte</label>
        <input type='checkbox' name='aficiones[]' id='musica' value='Música' />
        <label for='musica'>Escuchar música</label>
        <input type='checkbox' name='aficiones[]' id='viajar' value='Viajar' />
        <label for='viajar'>Viajar</label>
        <br><br>

        <label for='menuFav'>Menú favorito (selección múltiple):</label><br />
        <select name='menuFav[]' id='menuFav' multiple size="3">
            <option value='Pizza'>Pizza</option>
            <option value='Pasta'>Pasta</option>
            <option value='Hamburguesa'>Hamburguesa</option>
            <option value='Sushi'>Sushi</option>
        </select>
        <br>
        <small>Mantén presionada la tecla Ctrl para seleccionar múltiples opciones</small>
        <br><br>

        <input type='submit' value='Enviar'>
    </form>
</body>
</html>