<?php
require "conexion.php";

$id_submenu = $_GET["id_submenu"];

$sql = "SELECT * FROM productos WHERE id_submenu = $id_submenu";
$res = $conexion->query($sql);

$data = [];
while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
