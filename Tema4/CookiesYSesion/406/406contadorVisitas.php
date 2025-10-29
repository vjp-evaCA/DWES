<?php
if (isset($_GET['reset'])) {
    setcookie('accesos', '', time() - 3600); // Borra la cookie
    echo "<p>Contador reiniciado.</p>";
    echo '<a href="406contadorVisitas.php">Volver</a>';
    exit;
} 

$accesosPagina = 1;
if (isset($_COOKIE['accesos'])) { 
    $accesosPagina = $_COOKIE['accesos'] + 1;
    echo "<p>Has visitado esta página $accesosPagina veces.</p>";
} else {
    echo "<p>Es tu primera visita.</p>";
}
setcookie('accesos', $accesosPagina, time() + 3600); // Caducan dentro de una hora
echo '<br><a href="406contadorVisitas.php?reset=1">Reiniciar contador</a>';
?>