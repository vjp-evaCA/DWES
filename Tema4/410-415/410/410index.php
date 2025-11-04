<?php
echo "<h1>Datos recibidos:</h1>";

// Para mostrar el nombre que ha escrito el usuario
$nombre = $_POST["nombre"];
echo "<p>Nombre: $nombre</p>";

// Mostrar todos los módulos que ha seleccionado el usuario
if (isset($_POST['modulos'])) {
    echo "<p>Módulos seleccionados:</p>";
    foreach ($_POST['modulos'] as $modulo) {
        echo "- $modulo<br>";
    }
} else {

    // Si no selecciona ninguno
    echo "<p>No se seleccionaron módulos</p>";
}

// Para poder volver a enviar datos enlazamos el archivo .html
echo '<p><a href="410index.html">Volver al formulario</a></p>';
