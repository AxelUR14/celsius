<?php
header('Content-Type: application/json');
include 'conexion.php';

$action = $_GET['action'] ?? '';

switch($action) {

    // CATEGORÍAS
    case 'categorias':
        $res = $conexion->query("SELECT id, nombre FROM categorias");
        $cats = [];
        while($row = $res->fetch_assoc()){
            $cats[] = $row;
        }
        echo json_encode($cats);
        break;

    // SUBCATEGORÍAS
    case 'subcategorias':
        $cat_id = intval($_GET['categoria_id'] ?? 0);
        $res = $conexion->query("SELECT id, nombre FROM subcategorias WHERE categoria_id=$cat_id");
        $subs = [];
        while($row = $res->fetch_assoc()){
            $subs[] = $row;
        }
        echo json_encode($subs);
        break;

    // PRODUCTOS POR SUBCATEGORÍA
    case 'productos':
        $sub_id = intval($_GET['subcategoria_id'] ?? 0);
        $res = $conexion->query("SELECT id, nombre, descripcion, precio, imagen FROM productos WHERE subcategoria_id=$sub_id");
        $prods = [];
        while($row = $res->fetch_assoc()){
            $prods[] = $row;
        }
        echo json_encode($prods);
        break;

    // BUSCADOR
    case 'buscar':
        $texto = $conexion->real_escape_string($_GET['texto'] ?? '');
        $res = $conexion->query("SELECT id, nombre, descripcion, precio, imagen FROM productos WHERE nombre LIKE '%$texto%'");
        $prods = [];
        while($row = $res->fetch_assoc()){
            $prods[] = $row;
        }
        echo json_encode($prods);
        break;

    default:
        echo json_encode([]);
        break;
}
?>
