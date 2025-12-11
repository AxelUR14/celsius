<?php
header("Content-Type: application/json");

require __DIR__ . "/conexion.php";

// Consulta a la tabla 'menus' (categorías)
$sql = "SELECT * FROM menus";
$res = $conexion->query($sql);

// Verificar si hubo error en la consulta
if (!$res) {
    echo json_encode(["error" => $conexion->error]);
    exit;
}

// Crear array con los resultados
$data = [];
while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}

// Si no hay registros, devolvemos un mensaje
if (empty($data)) {
    echo json_encode(["mensaje" => "No se encontraron categorías"]);
    exit;
}

// Devolver JSON con los datos
echo json_encode($data);

// Cerrar conexión
$conexion->close();
?>
