<?php
header("Content-Type: application/json");
require 'conexion.php'; // Asegurate de que la ruta sea correcta

// Verificamos que se reciba el id del menú
if (!isset($_GET['id_menu'])) {
    echo json_encode(["error" => "No se indicó id_menu"]);
    exit;
}

// Convertimos a número para seguridad
$id_menu = intval($_GET['id_menu']);

// Consulta a la tabla submenus
$sql = "SELECT * FROM submenus WHERE id_menu = $id_menu";
$res = $conexion->query($sql);

if (!$res) {
    echo json_encode(["error" => $conexion->error]);
    exit;
}

$data = [];
while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}

// Devolvemos los datos en JSON
echo json_encode($data);
?>
