<?php
$host = "localhost";
$usuario = "root";
$password = ""; // si tienes contraseña de MySQL, reemplázala
$basedatos = "celsius"; // reemplaza con el nombre real de tu base

$conexion = new mysqli($host, $usuario, $password, $basedatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
