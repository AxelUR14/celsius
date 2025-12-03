<?php
$host = "127.0.0.1";
$port = 3307; // ⚠️ EL PUERTO DE TU MYSQL EN XAMPP

$usuario = "root";
$pass = "";
$bd = "celsius";

$conexion = new mysqli($host, $usuario, $pass, $bd, $port);

if ($conexion->connect_errno) {
    die("Error de conexión: (" . $conexion->connect_errno . ") " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>
