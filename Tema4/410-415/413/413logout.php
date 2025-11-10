<?php
// 413logout.php - Cerrar sesión
session_start();
$_SESSION = array();
session_destroy();
header('Location: ../410/410login.php');
exit;
?>