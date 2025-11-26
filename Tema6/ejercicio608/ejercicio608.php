<?php
// Configuración de conexión a la base de datos
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "lol"; 

try {
    // Crear conexión PDO a la base de datos de MySQL
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    // Configurar PDO parab que lance excepciones en caso de error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Crear tabla usuario
    $sql = "CREATE TABLE IF NOT EXISTS usuario (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        usuario VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        rol ENUM('administrador', 'usuario') DEFAULT 'usuario',
        fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    // Ejecutamos la consulta para crear la tabla
    $conn->exec($sql);
    echo "Tabla 'usuario' creada exitosamente.<br>";
    
    // Array de usuarios de ejemplo que vamos a insertar
    $usuarios = [
        [
            'nombre' => 'Admin Principal',
            'usuario' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'email' => 'admin@lol.com',
            'rol' => 'administrador'
        ],
        [
            'nombre' => 'Juan Pérez',
            'usuario' => 'juanperez',
            'password' => password_hash('juan456', PASSWORD_DEFAULT),
            'email' => 'juan@lol.com',
            'rol' => 'usuario'
        ],
        [
            'nombre' => 'María García',
            'usuario' => 'mariag',
            'password' => password_hash('maria789', PASSWORD_DEFAULT),
            'email' => 'maria@lol.com',
            'rol' => 'usuario'
        ]
    ];
    
    // Preparar consulta INSERT para agregar usuarios
    $stmt = $conn->prepare("INSERT IGNORE INTO usuario (nombre, usuario, password, email, rol) VALUES (:nombre, :usuario, :password, :email, :rol)");
    
    // Recorrer el array de usuarios e insertar cada uno
    foreach ($usuarios as $usuario) {
        $stmt->execute($usuario);
    }
    
    // Mensaje de confirmación
    echo "Usuarios de ejemplo insertados correctamente.";
    
} catch(PDOException $e) {
    // Capturar y mostrar cualquier error de PDO
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$conn = null;
?>