<?PHP 
require_once "../../functions/autoload.php";

$postData = $_POST;
$id = $_GET['id'] ?? FALSE;


try {

    $categoria = (new Categoria())->get_x_id($id);

    $categoria->edit($postData['categorias']);
    (new Alerta())->add_alerta('primary', "Se edito con exito la categoria");
    header('Location: ../index.php?sec=admin_categorias');
    
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo editar la categoria");
    header('Location: ../index.php?sec=admin_categorias');
}