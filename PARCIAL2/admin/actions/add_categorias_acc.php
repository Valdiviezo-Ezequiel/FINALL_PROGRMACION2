<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

try {

    (new Categoria())->insert(
        $postData['categorias']
    );
    (new Alerta())->add_alerta('primary', "Se agrego con exito la categoria");
    header('Location: ../index.php?sec=admin_categorias');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo cargar la categoria");
    header('Location: ../index.php?sec=admin_categorias');
}

