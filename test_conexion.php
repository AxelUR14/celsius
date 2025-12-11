<?php
// Incluimos la conexión
require 'conexion.php';

// Probamos la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
} else {
    echo "¡Conexión exitosa a la base de datos local!";
}
?>
