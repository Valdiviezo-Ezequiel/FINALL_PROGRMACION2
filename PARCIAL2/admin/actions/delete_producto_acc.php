<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

$categorias = (new Producto())-> producto_x_id($id);

try {
    $categorias->delete();
    (new Alerta())->add_alerta('primary', "Se borro el producto con éxito");
    header('Location: ../index.php?sec=admin_producto');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo eliminar el producto");
    header('Location: ../index.php?sec=admin_producto');
}