<?PHP
$producto = (new Producto())->catalogo_completo();

?>


        <div class="row p-5 d-flex align-items-center">
        <h1 class="text-center mb-5 fw-bold">Administración de Productos</h1>

            <div>
                <?= (new Alerta())->get_alertas(); ?>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" width="15%">Imagen</th>
                        <th scope="col" width="15%">Nombre</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Talles</th>
                        <th scope="col">Color</th>
                        <th scope="col">Disciplinas</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Fecha de lanzamiento</th>
                        <th scope="col">Envio</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($producto as $C) { ?>
                        <tr>
                            <td><img src="../img/webp_productos/<?= $C->getImagen() ?>" alt="Imágen Illustrativa de <?= $C->getNombre() ?>" class="img-fluid rounded shadow-sm"></td>
                            <td><?= $C->getNombre() ?></td>
                            <td><?= $C->getCategoria() ?></td>
                            <td><?= $C->getGenero() ?></td>
                            <td><?= $C->getDescripcion() ?></td>
                            <td><?= $C->getTalle() ?></td>
                            <!-- <td><?= $C->getEtiquetas() ?></td> -->
                            <!-- <td><?PHP print_r(($C->getEtiquetas())) ?></td> -->
                            <td>
                                <?PHP 
                                    foreach ($C->getEtiquetas() as $PS){
                                       echo "<p>" . $PS->getNombre() . "</p>";
                                    } 
                                ?>
                            </td>
                            <td><?= $C->getDisciplina() ?></td>
                            <td>$<?= $C->getPrecio() ?></td>
                            <td><?= $C->getLanzamiento() ?></td>
                            <td><?= $C->getEnvio() ?></td>
                            <td>
                                <a href="index.php?sec=edit_producto&id=<?= $C->getId() ?>" role="button" class="d-block btn btn-sm btn-light border border-dark rounded-2 mb-1">Editar</a>
                                <a href="index.php?sec=delete_producto&id=<?= $C->getId() ?>" role="button" class="d-block btn btn-sm btn-dark">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>

            <a href="index.php?sec=add_producto" class="btn btn-primary mt-5"> Cargar nuevo Producto</a>
        </div>

