<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

try {

    (new Generos())->insert(
        $postData['generos']
    );
    (new Alerta())->add_alerta('primary', "Se cargo exitosamente el genero");
    header('Location: ../index.php?sec=admin_generos');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo cargar el genero");
    header('Location: ../index.php?sec=admin_generos');
}
