<?php
// 411login.php - Controlador de login
session_start();

$usuario = $_POST['usuario'];
$password = $_POST['password'];

if ($usuario == 'usuario' && $password == 'usuario') {
    // Guardar usuario en sesión
    $_SESSION['usuario'] = $usuario;
    
    // Almacenar arrays de películas y series en la sesión
    $_SESSION['peliculas'] = [
        'El Padrino',
        'Pulp Fiction', 
        'El Señor de los Anillos'
    ];
    
    $_SESSION['series'] = [
        'Breaking Bad',
        'Juego de Tronos',
        'Stranger Things'
    ];
    
    header('Location: ../412/412peliculas.php');
} else {
    // CORREGIDO: Redirigir al formulario de LOGIN, no al del alumno
    header('Location: ../410/410login.php?error=1');
}
exit;
?>