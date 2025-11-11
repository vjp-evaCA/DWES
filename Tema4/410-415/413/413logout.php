<?php
// Inicio de sesión
session_start();

// Limpio las variable de la sesión
$_SESSION = array();

// Destryo la sesión 
session_destroy();

// Redirijo al usuario al formulario de login
header('Location: ../410/410login.php');
exit;
