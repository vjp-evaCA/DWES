<?php

// Verifica si el formulario fue enviado mediante el botón
if (isset($_POST['btnSubir']) && $_POST['btnSubir'] == 'Subir') {
    $errores = [];

    // Valida que la anchura sea un número válido
    if (!isset($_POST['anchura']) || !is_numeric($_POST['anchura'])) {
        $errores[] = "Anchura no válida";
    }

    // Valida que la altura sea un número válido
    if (!isset($_POST['altura']) || !is_numeric($_POST['altura'])) {
        $errores[] = "Altura no válida";
    }

    // Verifica que el archivo se haya  subido correctamente sin errores
    if (!isset($_FILES['archivoEnviado']) || $_FILES['archivoEnviado']['error'] != 0) {
        $errores[] = "Error al subir el archivo";
    } else {
        $tipo = $_FILES['archivoEnviado']['type'];
        if (strpos($tipo, 'image/') !== 0) {
            $errores[] = "Solo se permiten archivos de imagen";
        }
    }

    // Si no hay errores...
    if (empty($errores)) {
        $nombre = basename($_FILES['archivoEnviado']['name']);
        if (!is_dir('./uploads')) {
            mkdir('./uploads');
        }
        move_uploaded_file($_FILES['archivoEnviado']['tmp_name'], "./uploads/{$nombre}");
        echo "<p>Archivo $nombre subido con éxito</p>";
        echo "<p>Anchura: {$_POST['anchura']}, Altura: {$_POST['altura']}</p>";
        // Mostrar la imagen con el tamaño recibido
        echo "<img src='uploads/$nombre' width='{$_POST['anchura']}' height='{$_POST['altura']}' alt='Imagen subida'>";
    } else {

        // Muestra los errores si los hay
        foreach ($errores as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>
