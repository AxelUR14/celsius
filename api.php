<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json; charset=utf-8');
require "conexion.php";

$action = $_GET['action'] ?? '';

switch($action) {

    case 'menus':
        $res = $conexion->query("SELECT id, nombre FROM menus ORDER BY nombre ASC");
        $data = [];
        while($row = $res->fetch_assoc()){ $data[] = $row; }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        break;

    case 'submenus':
        $id_menu = intval($_GET['id_menu'] ?? 0);
        $res = $conexion->query("SELECT id, nombre FROM submenus WHERE id_menu = $id_menu");
        $data = [];
        while($row = $res->fetch_assoc()){ $data[] = $row; }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        break;

    case 'productos':
        $id_submenu = intval($_GET['id_submenu'] ?? 0);
        $res = $conexion->query("SELECT * FROM productos WHERE id_submenu = $id_submenu");
        $data = [];
        while($row = $res->fetch_assoc()){ $data[] = $row; }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        break;

    case 'buscar':
        $texto = $conexion->real_escape_string($_GET['texto'] ?? '');
        $res = $conexion->query("SELECT * FROM productos WHERE nombre LIKE '%$texto%'");
        $data = [];
        while($row = $res->fetch_assoc()){ $data[] = $row; }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        break;

    default:
        echo json_encode(["error"=>"acción no válida"]);
        break;
}
?>
