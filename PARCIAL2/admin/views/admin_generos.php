<?PHP 
$listaDeGeneros = (new Generos)->listaCompletaGeneros();

?>
<div class=" d-flex justify-content-center p-5 bg-white">
    <div>
        <h1 class="text-center mb-5 fw-bold">Administracion de Generos</h1>
       
        <div class="row">
            <div class="col">
            <div>
                <?= (new Alerta())->get_alertas(); ?>
            </div>
                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Generos</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?PHP foreach ($listaDeGeneros as $P) { ?>
                                <tr>
                                <td><?= $P->getId() ?></td>
                                    <td><?= $P->getGeneros() ?></td>
                                    <td>
                                        <a href="index.php?sec=edit_generos&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-light border border-dark rounded-2 mb-1">Editar</a>
                                        <a href="index.php?sec=delete_generos&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-dark">Eliminar</a>
                                    </td>
                                </tr>
                            <?PHP } ?>
                        </tbody>

                </table>
                <a href="index.php?sec=add_generos" class="btn btn-primary mt-5"> Cargar nuevo Genero</a>
            </div>
        </div>


    </div>
</div>