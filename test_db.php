<?php
$usuario = "root";
$clave = ""; 
$base = "celsius";

$conexion = new mysqli($host, $usuario, $password, $basedatos);

if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
} else {
    echo "✅ Conexión exitosa a la base de datos '$basedatos'.";
}

// Opcional: probar una consulta simple
$res = $conexion->query("SHOW TABLES");
if($res) {
    echo "<br>Tablas en la base de datos:";
    while($row = $res->fetch_row()){
        echo "<br>- ".$row[0];
    }
} else {
    echo "<br>❌ Error al obtener tablas: " . $conexion->error;
}
?>
