<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

$disciplinas = (new Disciplinas())-> get_x_id($id);

try {
    $disciplinas->delete();
    (new Alerta())->add_alerta('primary', "Se elimino exitosamente la disciplina");
    header('Location: ../index.php?sec=admin_disciplinas');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo eliminar la disciplina");
    header('Location: ../index.php?sec=admin_disciplinas');
}