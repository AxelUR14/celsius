<?php
header("Content-Type: application/json");

require __DIR__ . "/conexion.php";

if (!isset($_GET["id_submenu"])) {
    echo json_encode([]);
    exit;
}

$id_submenu = intval($_GET["id_submenu"]);

$sql = "SELECT * FROM productos WHERE id_submenu = $id_submenu";
$res = $conexion->query($sql);

$data = [];

while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
