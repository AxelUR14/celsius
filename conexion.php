<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexión a la base de datos MySQL local
$host = "localhost";
$user = "root";       // Usuario local (XAMPP)
$password = "";       // Contraseña local (XAMPP)
$dbname = "celsius"; // Tu base de datos
$port = 3307;         // Puerto donde corre MySQL

// Crear conexión
$conexion = new mysqli($host, $user, $password, $dbname, $port);

// Verificar conexión
if ($conexion->connect_error) {
    die("ERROR DE CONEXIÓN: " . $conexion->connect_error);
} else {
    echo "¡Conexión exitosa a la base de datos local en puerto $port!";
}
?>
