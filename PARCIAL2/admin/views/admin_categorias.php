<?PHP 
$listaDeCategorias = (new Categoria)->listaCompletaCategoria();

?>
<div class=" d-flex justify-content-center p-5 bg-white">
    <div>
        <h1 class="text-center mb-5 fw-bold">Administracion de categorias</h1>
       
        <div class="row">
            <div class="col">
            <div>
                <?= (new Alerta())->get_alertas(); ?>
            </div>
                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?PHP foreach ($listaDeCategorias as $P) { ?>
                                <tr>
                                    <td><?= $P->getId() ?></td>
                                    <td><?= $P->getCategorias() ?></td>
                                    <td>
                                        <a href="index.php?sec=edit_categorias&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-light border border-dark rounded-2 mb-1">Editar</a>
                                        <a href="index.php?sec=delete_categorias&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-dark">Eliminar</a>
                                    </td>
                                </tr>
                            <?PHP } ?>
                        </tbody>

                </table>
                <a href="index.php?sec=add_categorias" class="btn btn-primary mt-5"> Cargar nueva categoria</a>
            </div>
        </div>


    </div>
</div>