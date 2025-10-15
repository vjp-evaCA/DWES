<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resumen del formulario</title>
</head>

<body>
    <h2>Resumen del formulario</h2>

    <?php
    if ($_POST && empty($errores)) {
        echo "<table border='1' cellpadding='8'>";

        echo "<tr><td><strong>Nombre completo</strong></td><td>" .
            ($_POST['nombreCompleto'] ?: 'No especificado') . "</td></tr>";

        echo "<tr><td><strong>Email</strong></td><td>" .
            ($_POST['email'] ?: 'No especificado') . "</td></tr>";

        echo "<tr><td><strong>URL página personal</strong></td><td>" .
            ($_POST['url'] ?: 'No especificado') . "</td></tr>";

        echo "<tr><td><strong>Sexo</strong></td><td>" .
            ($_POST['sexo'] ?: 'No especificado') . "</td></tr>";

        echo "<tr><td><strong>Número de convivientes</strong></td><td>" .
            ($_POST['nConvivientes'] ?: '0') . "</td></tr>";

        echo "<tr><td><strong>Aficiones</strong></td><td>";
        echo $_POST['aficiones'] ? implode(', ', $_POST['aficiones']) : 'Ninguna';
        echo "</td></tr>";

        echo "<tr><td><strong>Menú favorito</strong></td><td>";
        echo $_POST['menuFav'] ? implode(', ', $_POST['menuFav']) : 'Ninguno';
        echo "</td></tr>";

        echo "</table>";

        echo "<p><a href='402formulario.html'>Volver al formulario</a></p>";

        print_r($errores);
    } else if (isset($errores) && !empty($errores)) {
        echo "<p style='color: red'>No se pueden mostrar los datos debido a errores en el formulario.</p>";
        echo "<p><a href='402formulario.html'>Volver al formulario</a></p>";
        foreach ($errores as $error) {
            echo $error . "<br>";
        }
    } else {
        echo "<p>No se recibieron datos.</p>";
        echo "<p><a href='402formulario.html'>Ir al formulario</a></p>";
    }
    ?>
</body>

</html>