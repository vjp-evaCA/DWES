<?php
// Inicio de sesión
session_start();

// Cojo el usuario y la contraseña
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Verifico si son correctas
if (($usuario == 'usuario') && ($contrasena == 'usuario')) {

    // Guardar usuario en la sesión
    $_SESSION['usuario'] = $usuario;

    // Array de películas
    $_SESSION['peliculas'] = [
        'Star Wars',
        'Harry Potter',
        'Marvel'
    ];

    // Array de series
    $_SESSION['series'] = [
        'Las chicas Gilmore',
        'La casa de papel',
        'Anatomía de Grey'
    ];

    // Redirección a este archivo
    header('Location: ../412/412peliculas.php');
} else {
    
    // Redirige al formulario de LOGIN
    header('Location: ../410/410login.php?error=1');
}
exit;
