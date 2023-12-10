<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

$generos = (new Generos())-> get_x_id($id);

try {
    $generos->delete();
    (new Alerta())->add_alerta('primary', "Se elimino exitosamente el genero");
    header('Location: ../index.php?sec=admin_generos');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo eliminar el genero");
    header('Location: ../index.php?sec=admin_generos');
}