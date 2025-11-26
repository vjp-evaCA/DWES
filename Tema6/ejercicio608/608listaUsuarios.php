<?php
// 608listaUsuarios.php - Lista de usuarios registrados en el sistema

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "lol"; 

try {
    // Crear conexión PDO
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener todos los usuarios ordenados por fecha de registro
    $sql = "SELECT id, nombre, usuario, email, rol, fecha_registro FROM usuario ORDER BY fecha_registro DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios Registrados</title>
    <link rel="stylesheet" href="css/608listaUsuarios.css">
</head>
<body>

    <h1>Lista de Usuarios Registrados</h1>
    
    <?php
    // Verificar si hay resultados
    if (!empty($usuarios)) {
        $total_usuarios = count($usuarios);
        
        // Mostrar el contador total
        echo "<div class='total-usuarios'>Total de usuarios registrados: $total_usuarios</div>";
        
        // Mostrar cada usuario
        foreach($usuarios as $usuario) {
            echo "<div class='usuario-card'>";
            
            // Header con nombre y rol
            echo "<div class='usuario-header'>";
            echo "<div class='usuario-nombre'>" . htmlspecialchars($usuario['nombre']) . "</div>";
            $rolClass = ($usuario['rol'] == 'administrador') ? 'administrador' : '';
            echo "<div class='usuario-rol $rolClass'>" . htmlspecialchars($usuario['rol']) . "</div>";
            echo "</div>";
            
            // Información del usuario
            echo "<div class='usuario-info'>";
            echo "<strong>Usuario:</strong> " . htmlspecialchars($usuario['usuario']);
            echo "</div>";
            
            echo "<div class='usuario-info'>";
            echo "<strong>Email:</strong> " . htmlspecialchars($usuario['email']);
            echo "</div>";
            
            echo "<div class='usuario-info'>";
            echo "<strong>Fecha de registro:</strong> " . htmlspecialchars($usuario['fecha_registro']);
            echo "</div>";
            
            echo "<div class='usuario-info'>";
            echo "<strong>ID:</strong> " . htmlspecialchars($usuario['id']);
            echo "</div>";
            
            echo "</div>"; // Cierre de usuario-card
        }
        
    } else {
        echo "<div class='no-usuarios'>";
        echo "<p>No se encontraron usuarios registrados en el sistema.</p>";
        echo "<a href='608registro.php'>Registrar primer usuario</a>";
        echo "</div>";
    }
    
    // Cerrar conexión
    $conn = null;
    ?>

    <div class="nav-links">
        <a href="608registro.php">Registrar Nuevo Usuario</a>
    </div>
</body>
</html>