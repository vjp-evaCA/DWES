<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Validación del formulario del usuario</title>
</head>

<body>
    <h2>Resultado de la validación</h2>

    <?php
    if ($_POST) {
        $errores = [];

        // Validaciones básicas
        if (empty($_POST['nombreCompleto'])) {
            $errores[] = "El nombre completo es obligatorio";
        }

        if (empty($_POST['email'])) {
            $errores[] = "El email es obligatorio";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El email no es válido";
        }

        if (empty($_POST['sexo'])) {
            $errores[] = "Debe seleccionar un sexo";
        }

        if (empty($_POST['nConvivientes'])) {
            $errores[] = "El número de convivientes es obligatorio";
        } elseif ($_POST['nConvivientes'] < 0 || $_POST['nConvivientes'] > 20) {
            $errores[] = "El número de convivientes debe estar entre 0 y 20";
        }

        // Si hay errores, mostrarlos
        if (!empty($errores)) {
            echo "<h3 style='color: red'>Errores encontrados:</h3>";
            echo "<ul>";
            foreach ($errores as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            echo "<p><a href='402formulario.html'>Volver al formulario</a></p>";
        } else {
            // Si no hay errores, mostrar los datos
            echo "<h3 style='color: green'>Datos válidos - Formulario procesado correctamente</h3>";

            echo "<table border='1' cellpadding='8'>";
            echo "<tr><td><strong>Nombre completo</strong></td><td>" . htmlspecialchars($_POST['nombreCompleto']) . "</td></tr>";
            echo "<tr><td><strong>Email</strong></td><td>" . htmlspecialchars($_POST['email']) . "</td></tr>";
            echo "<tr><td><strong>URL página personal</strong></td><td>" . ($_POST['url'] ? htmlspecialchars($_POST['url']) : 'No especificado') . "</td></tr>";
            echo "<tr><td><strong>Sexo</strong></td><td>" . htmlspecialchars($_POST['sexo']) . "</td></tr>";
            echo "<tr><td><strong>Número de convivientes</strong></td><td>" . $_POST['nConvivientes'] . "</td></tr>";

            echo "<tr><td><strong>Aficiones</strong></td><td>";
            echo isset($_POST['aficiones']) ? htmlspecialchars(implode(', ', $_POST['aficiones'])) : 'Ninguna';
            echo "</td></tr>";

            echo "<tr><td><strong>Menú favorito</strong></td><td>";
            echo isset($_POST['menuFav']) ? htmlspecialchars(implode(', ', $_POST['menuFav'])) : 'Ninguno';
            echo "</td></tr>";

            echo "</table>";
            echo "<p><a href='402formulario.html'>Volver al formulario</a></p>";
        }
    } else {
        echo "<p>No se recibieron datos.</p>";
        echo "<p><a href='402formulario.html'>Ir al formulario</a></p>";
    }
    ?>
</body>

</html>