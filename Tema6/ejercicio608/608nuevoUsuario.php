<?php
// Configuración de la base de datos
$servername = "localhost";  
$username = "root";         
$password = "";             
$database = "lol";          

try {
    // Crear conexión PDO 
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    // Configurar PDO para que lance excepciones en caso de error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ===== RECOGER Y LIMPIAR DATOS DEL FORMULARIO =====
    
    
    $nombre = trim($_POST['nombre'] ?? '');         
    $usuario = trim($_POST['usuario'] ?? '');        
    $password_plana = $_POST['password'] ?? '';      
    $email = trim($_POST['email'] ?? '');            
    $rol = $_POST['rol'] ?? '';                      

    // ===== VALIDACIÓN DE CAMPOS OBLIGATORIOS =====
    // Array para acumular mensajes de error
    $errores = [];  

    // Verificar que ningún campo obligatorio esté vacío
    if (empty($nombre)) $errores[] = "El nombre no puede estar vacío";
    if (empty($usuario)) $errores[] = "El usuario no puede estar vacío";
    if (empty($password_plana)) $errores[] = "La contraseña no puede estar vacía";
    if (empty($email)) $errores[] = "El email no puede estar vacío";
    if (empty($rol)) $errores[] = "El rol no puede estar vacío";

    // ===== VALIDACIONES ADICIONALES =====
    // Longitud mínima de contraseña
    if (strlen($password_plana) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres";
    }

    // Validar formato de email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del email no es válido";
    }

    // Validar que el rol sea uno de los permitidos
    if (!in_array($rol, ['administrador', 'usuario'])) {
        $errores[] = "El rol seleccionado no es válido";
    }

    // ===== MANEJO DE ERRORES DE VALIDACIÓN =====
    // Si hay errores, mostrarlos y detener la ejecución
    if (!empty($errores)) {
        echo "<h1>Errores en el formulario:</h1>";
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";  // Mostrar cada error en una lista
        }
        echo "</ul>";
        echo '<a href="608registro.php">Volver al formulario</a>';
        exit;  // Terminar la ejecución del script
    }

    // ===== VERIFICAR USUARIO/EMAIL DUPLICADOS =====
    // Preparar consulta para buscar usuarios o emails existentes
    $stmt = $conn->prepare("SELECT id FROM usuario WHERE usuario = :usuario OR email = :email");
    $stmt->execute(['usuario' => $usuario, 'email' => $email]);

    // Si existe algún registro, significa que el usuario o email ya están en uso
    if ($stmt->rowCount() > 0) {
        echo "<h1>Error:</h1>";
        echo "<p>El usuario o email ya existen en el sistema.</p>";
        echo '<a href="608registro.php">Volver al formulario</a>';
        exit;  // Terminar la ejecución
    }

    // ===== CIFRADO DE CONTRASEÑA =====
    // Convertir la contraseña en texto plano a hash seguro
    $password_hash = password_hash($password_plana, PASSWORD_DEFAULT);

    // ===== INSERCIÓN EN LA BASE DE DATOS =====
    // Preparar consulta INSERT con parámetros nombrados para seguridad
    $stmt = $conn->prepare("INSERT INTO usuario (nombre, usuario, password, email, rol) VALUES (:nombre, :usuario, :password, :email, :rol)");

    // Ejecutar la inserción con los datos validados y la contraseña cifrada
    $stmt->execute([
        'nombre' => $nombre,
        'usuario' => $usuario,
        'password' => $password_hash,  // Se guarda el hash, no la contraseña en texto plano
        'email' => $email,
        'rol' => $rol
    ]);

    // ===== MENSAJE DE ÉXITO =====
    echo "<h1>Usuario registrado exitosamente</h1>";
    echo "<p>El usuario <strong>$usuario</strong> ha sido introducido en el sistema con la contraseña <strong>$password_plana</strong>.</p>";
    echo "<p><strong>Nota:</strong> La contraseña ha sido cifrada antes de guardarla en la base de datos.</p>";
    echo '<a href="608registro.php">Registrar otro usuario</a>';

} catch (PDOException $e) {
    // ===== MANEJO DE ERRORES DE BASE DE DATOS =====
    // Capturar y mostrar cualquier excepción de PDO
    echo "<h1>Error en la base de datos:</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo '<a href="608registro.php">Volver al formulario</a>';
}

// ===== CERRAR CONEXIÓN =====
// Liberar recursos de conexión a la base de datos
$conn = null;