<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

try {

    (new Disciplinas())->insert(
        $postData['disciplina']
    );
    (new Alerta())->add_alerta('primary', "Se cargo exitosamente la disciplina");
    header('Location: ../index.php?sec=admin_disciplinas');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo cargar la disciplina");
    header('Location: ../index.php?sec=admin_disciplinas');
}