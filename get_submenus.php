<?php
require "conexion.php";

$id_menu = $_GET["id_menu"];

$sql = "SELECT * FROM submenus WHERE id_menu = $id_menu";
$res = $conexion->query($sql);

$data = [];
while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
