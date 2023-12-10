<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

$categorias = (new Categoria())-> get_x_id($id);

try {
    $categorias->delete();
    (new Alerta())->add_alerta('primary', "Se elimino con exito la categoria");
    header('Location: ../index.php?sec=admin_categorias');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo eliminar la categoria");
    header('Location: ../index.php?sec=admin_categorias');
}