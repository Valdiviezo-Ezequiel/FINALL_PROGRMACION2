<?PHP 
require_once "../../functions/autoload.php";

$postData = $_POST;
$id = $_GET['id'] ?? FALSE;


try {

    $genero = (new Generos())->get_x_id($id);

    $genero->edit($postData['generos']);
    (new Alerta())->add_alerta('primary', "Se edito exitosamente el genero");
    header('Location: ../index.php?sec=admin_generos');
    
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo editar el genero");
    header('Location: ../index.php?sec=admin_generos');
}