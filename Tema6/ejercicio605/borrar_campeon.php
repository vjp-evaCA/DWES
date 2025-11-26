<?php
// borrar_campeon.php - Maneja la eliminación de campeones

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

// Verificar si se recibió el ID por GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    
    // Preparar la consulta para eliminar el campeón
    $sql = "DELETE FROM campeon WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir de vuelta a la lista de campeones
        header("Location: 606campeones.php");
        exit();
    } else {
        echo "Error al eliminar el campeón: " . $conn->error;
    }
    
    $stmt->close();
} else {
    echo "ID no válido";
}

// Cerrar conexión
$conn->close();
?>