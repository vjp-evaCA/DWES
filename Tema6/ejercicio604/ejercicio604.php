<?php
// 604campeones.php - Lista de campeones de League of Legends

// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "lol"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para obtener todos los campeones
$sql = "SELECT * FROM campeon";
$result = $conn->query($sql);

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
    if ($result && $result->num_rows > 0) {
        $total_campeones = $result->num_rows;
        
        // Mostrar el contador separado (en negrita como en la imagen)
        echo "<p><strong>Total de campeones en la base de datos: $total_campeones</strong></p>";
        
        // Mostrar cada campeón individualmente con saltos de línea
        while($row = $result->fetch_assoc()) {
            // Nombre del campeón en negrita
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
    $conn->close();
    ?>
</body>
</html>