<?php
$usuario = $_POST['usuario'];
$password = $_POST['password'];

if ($usuario == 'usuario' && $password == 'usuario') {
    header('Location: ../412/412peliculas.php');
} else {
    header('Location: ../410/410index.php?error=1');
}
?>