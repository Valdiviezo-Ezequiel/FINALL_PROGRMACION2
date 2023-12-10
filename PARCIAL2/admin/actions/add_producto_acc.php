<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

try {

    (new Producto())->insert(
        $postData['nombre'],
        $postData['descripcion'],
        $postData['categoria_id'],
        $postData['genero_id'],
        $postData['disciplinas_id'],
        $postData['talles'],
        $postData['fecha_lanzamiento'],
        $postData['color'],
        $postData['imagen'],
        $postData['envio'],
        $postData['precio'],
    );
    (new Alerta())->add_alerta('primary', "Se cargo exitosamente el producto");
    header('Location: ../index.php?sec=admin_producto');
} catch (Exception $e) {
    var_dump($e);
    echo "Error: " . $e->getMessage() . " Data: " . print_r($postData, true);
    (new Alerta())->add_alerta('danger', "No se pudo cargar el producto");
    //header('Location: ../index.php?sec=admin_producto');
}

