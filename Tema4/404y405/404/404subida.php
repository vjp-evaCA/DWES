<?php
// Formulario HTML

// Verifica si el formulario fue enviado
if (isset($_POST['btnSubir']) && $_POST['btnSubir'] == 'Subir') {
    $errores = []; // Array de errores

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
    }

    // Si no hay errores...
    if (empty($errores)) {
        $nombre = basename($_FILES['archivoEnviado']['name']);
        if (!is_dir('./uploads')) {
            mkdir('./uploads');
        }
        move_uploaded_file($_FILES['archivoEnviado']['tmp_name'], "./uploads/{$nombre}");

        // Muestra resultados exitosos
        echo "<p>Archivo $nombre subido con éxito</p>";
        echo "<p>Anchura: {$_POST['anchura']}, Altura: {$_POST['altura']}</p>";
    } else {

        // Muestra los errores si los hay
        foreach ($errores as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
