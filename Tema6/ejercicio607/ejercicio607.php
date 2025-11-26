<?php
// 604campeones.php - Lista de campeones de League of Legends (versión PDO)

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "lol"; 

try {
    // Crear conexión PDO
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // Configurar el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Consulta para obtener todos los campeones
    $sql = "SELECT * FROM campeon";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    // Obtener todos los resultados como array asociativo
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Campeones - League of Legends</title>
</head>
<body>
    <h1>Lista de Campeones del LOL</h1>
    
    <?php
    // Verificar si hay resultados
    if (!empty($result)) {
        $total_campeones = count($result);
        
        // Mostrar el contador separado
        echo "<p><strong>Total de campeones en la base de datos: $total_campeones</strong></p>";
        
        // Mostrar cada campeón individualmente con saltos de línea
        foreach($result as $row) {
            // Nombre del campeón
            echo "<p><strong>" . htmlspecialchars($row['nombre'] ?? 'Sin nombre') . "</strong></p>";
            
            // Rol del campeón
            echo "<p><strong>Rol:</strong> " . htmlspecialchars($row['rol'] ?? 'No especificado') . "</p>";
            
            // Dificultad del campeón
            echo "<p><strong>Dificultad:</strong> " . htmlspecialchars($row['dificultad'] ?? 'No especificada') . "</p>";
            
            // Descripción del campeón (si existe)
            if (!empty($row['descripcion'])) {
                echo "<p>" . htmlspecialchars($row['descripcion']) . "</p>";
            }
            
            // Espacio entre campeones
            echo "<br>";
        }
        
    } else {
        echo "<p>No se encontraron campeones en la base de datos.</p>";
    }
    
    // Cerrar conexión
    $conn = null;
    ?>
</body>
</html>