<?PHP 
require_once "../../functions/autoload.php";

$postData = $_POST;
$id = $_GET['id'] ?? FALSE;


try {

    $disciplinas = (new Disciplinas())->get_x_id($id);

    $disciplinas->edit($postData['disciplinas']);
    (new Alerta())->add_alerta('primary', "Se edito exitosamente la disciplina");
    header('Location: ../index.php?sec=admin_disciplinas');
    
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo editar la disciplina");
    header('Location: ../index.php?sec=admin_disciplinas');
}