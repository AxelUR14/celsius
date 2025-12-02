<?php
include "conexion.php";

$categoría = $_GET['categoria'];

$sql = "SELECT * FROM productos WHERE categoria = '$categoría'";
$result = $conn->query($sql);

$productos = [];

while($row = $result->fetch_assoc()){
    $productos[] = $row;
}

echo json_encode($productos);
?>
