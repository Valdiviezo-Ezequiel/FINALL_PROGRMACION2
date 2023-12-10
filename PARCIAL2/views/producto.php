<?PHP
$id = $_GET['id'] ?? FALSE;

$objetoProducto = new Producto();
$producto = $objetoProducto->producto_x_id($id);

//   echo "<pre>";
//   print_r($producto);
//   echo "</pre>";
?>

<div class="row">

    <div class="col mt-5">
    <?PHP if (!empty($producto)) { ?>
            <div class="card mb-5">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="img/webp_productos/<?= $producto->getImagen() ?>" class="img-fluid rounded-start border-end" alt="Portada de <?= $producto->getNombre() ?>">
                    </div>
                    <div class="col-md-7 d-flex flex-column p-3">
                        <div class="card-body flex-grow-0">
                            <h2 class="card-title fs-2 mb-4"><?= $producto->getNombre() ?></h2>
                            <p class="card-text"><?= $producto->getDescripcion() ?></p>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="fw-bold">Disciplina:</span> <?= $producto->getDisciplina() ?></li>
                            <li class="list-group-item"><span class="fw-bold">Categoria:</span> <?= $producto->getCategoria() ?></li>
                            <li class="list-group-item"><span class="fw-bold">Talle:</span> <?= $producto->getTalle() ?></li>
                            <li class="list-group-item"><span class="fw-bold">Color:</span> <?= $producto->getColor() ?></li>
                            <li class="list-group-item"><span class="fw-bold">Genero:</span> <?= $producto->getGenero() ?></li>
                            <li class="list-group-item"><span class="fw-bold">Fecha de lanzamiento:</span> <?= $producto->getLanzamiento() ?></li>
                            <li class="list-group-item"><span class="fw-bold">Envio:</span> <?= $producto->getEnvio() ?></li>
                        </ul>

                        <div class="card-body flex-grow-0 mt-auto">
                            <div class="fs-3 mb-3 fw-bold text-center">$<?= $producto->getPrecio() ?></div>
                            
                            <form action="admin/actions/add_item_acc.php" method="GET" class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <label for="q" class="fw-bold me-2">Cantidad: </label>
                                        <input type="number" class="form-control" value="1" name="q" id="q">
                                    </div>
                                    <div class="col-6">
                                        <input type="submit" value="AGREGAR A CARRITO" class="btn btn-danger w-100 fw-bold">
                                        <input type="hidden" value="<?= $id ?>" name="id" id="id">

                                    </div>
                                </form>


                        </div>
                    </div>
                </div>
            </div>

<h2>Otros productos relacionados con las mismas etiquetas</h2>

<div class="container d-flex">
            <?PHP foreach ($producto->getEtiquetas() as $PS){
                                ?>

                        <div class="card col-12 col-sm-4 col-md-3 col-lg-3 mt-2 me-2">
                            <img src="img/webp_productos/<?= $PS->getImagen() ?>" class="card-img-top" alt="<?= $PS->getNombre() ?>">
                            <div class="">
                                <h3 class="card-title"><?= $PS->getNombre() ?></h3>
                            </div>
                            <div class="">
                                <h4 class="card-title text-center mt-2">Precio :$<?= $PS->getPrecio() ?></h4>
                            </div>
                            <div class="card-body m-auto">
                                <a href="index.php?sec=producto&id=<?= $PS->getId() ?>" type="button" class="btn btn-outline-danger">Ver más</a>
                            </div>
                        </div>

            <?PHP  } ?>

</div>


            <?PHP } else { ?>
                <div class="col">
                    <h2 class="text-center m-5">No se pudo encontrar el producto deseado.</h2>
                </div>
            <?PHP } ?>


         </div>



</div>