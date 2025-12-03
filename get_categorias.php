<?php
require "conexion.php";

$sql = "SELECT * FROM menus ORDER BY nombre ASC";
$res = $conexion->query($sql);

$data = [];
while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
