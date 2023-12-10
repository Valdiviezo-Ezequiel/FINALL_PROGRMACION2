<?PHP
$id_categoria = $_GET['ser'] ?? FALSE;

$nombreCategoria = (new Categoria())->get_x_id($id_categoria);
$tituloCategoria = $nombreCategoria->getCategorias();

$catalogo = (new Producto())->catalogo_x_categoria($id_categoria);
?>


<div>
        <h2 class=" m-5">Nuestros productos de <?= $tituloCategoria?></h2>
        <div class="container d-flex">

            <div class="row justify-content-around">

                <?PHP foreach ($catalogo as $producto) { ?>


                        <div class="card col-12 col-sm-4 col-md-3 col-lg-3 mt-2 me-2">
                            <img src="img/webp_productos/<?= $producto->getImagen() ?>" class="card-img-top" alt="<?= $producto->getNombre() ?>">
                            <div class="card-body">
                                <h3 class="card-title"><?= $producto->getNombre() ?></h3>
                                <p class="card-text"><?= $producto->descripcion_reducida(20) ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Disciplina: <?= $producto->getDisciplina() ?></li>
                                <li class="list-group-item">Precio: <?=$producto->getPrecio() ?> </li>
                                <li class="list-group-item">Envio: <?= $producto->getEnvio() ?></li>
                            </ul>
                            <div class="card-body m-auto">
                                <a href="index.php?sec=producto&id=<?= $producto->getId() ?>" type="button" class="btn btn-outline-danger">Ver más</a>
                            </div>
                        </div>    

<?PHP } ?>


            </div>

        </div>
    </div>