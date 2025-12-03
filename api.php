<?php
header('Content-Type: application/json');
require "conexion.php";

$action = $_GET['action'] ?? '';

switch($action) {

    // MENÚS PRINCIPALES
    case 'menus':
        $res = $conexion->query("SELECT id, nombre FROM menus ORDER BY nombre ASC");
        $data = [];
        while($row = $res->fetch_assoc()){ $data[] = $row; }
        echo json_encode($data);
        break;

    // SUBMENÚS POR MENÚ
    case 'submenus':
        $id_menu = intval($_GET['id_menu'] ?? 0);
        $res = $conexion->query("SELECT id, nombre FROM submenus WHERE id_menu = $id_menu");
        $data = [];
        while($row = $res->fetch_assoc()){ $data[] = $row; }
        echo json_encode($data);
        break;

    // PRODUCTOS POR SUBMENÚ
    case 'productos':
        $id_submenu = intval($_GET['id_submenu'] ?? 0);
        $res = $conexion->query("SELECT * FROM productos WHERE id_submenu = $id_submenu");
        $data = [];
        while($row = $res->fetch_assoc()){ $data[] = $row; }
        echo json_encode($data);
        break;

    // BUSCADOR
    case 'buscar':
        $texto = $conexion->real_escape_string($_GET['texto'] ?? '');
        $res = $conexion->query("SELECT * FROM productos WHERE nombre LIKE '%$texto%'");
        $data = [];
        while($row = $res->fetch_assoc()){ $data[] = $row; }
        echo json_encode($data);
        break;

    // DEFAULT
    default:
        echo json_encode(["error"=>"acción no válida"]);
        break;
}
?>
