<?php
define('DB_HOST', 'localhost'); // Cambiar si es necesario
define('DB_USER', 'root'); // Usuario de MySQL
define('DB_PASS', ''); // Contraseña de MySQL
define('DB_NAME', 'breakingbad_db'); // Nombre de la base de datos

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verificar conexión


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
   // echo "Conexión exitosa";
}
?>
