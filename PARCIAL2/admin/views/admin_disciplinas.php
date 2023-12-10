<?PHP 
$listaDeDisciplinas = (new Disciplinas)->listaCompletaDisciplinas();

?>
<div class=" d-flex justify-content-center p-5 bg-white">
    <div>
        <h1 class="text-center mb-5 fw-bold">Administracion de disciplinas</h1>
       
        <div class="row">
            <div class="col">
            <div>
                <?= (new Alerta())->get_alertas(); ?>
            </div>
                    <table class="table">

                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Disciplinas</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?PHP foreach ($listaDeDisciplinas as $P) { ?>
                                <tr>
                                    <td><?= $P->getId() ?></td>
                                    <td><?= $P->getDisciplinas() ?></td>
                                    <td>
                                        <a href="index.php?sec=edit_disciplinas&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-light border border-dark rounded-2 mb-1">Editar</a>
                                        <a href="index.php?sec=delete_disciplinas&id=<?= $P->getId() ?>" role="button" class="d-block btn btn-sm btn-dark">Eliminar</a>
                                    </td>
                                </tr>
                            <?PHP } ?>
                        </tbody>

                </table>
                <a href="index.php?sec=add_disciplinas" class="btn btn-primary mt-5"> Cargar nueva disciplina</a>
            </div>
        </div>


    </div>
</div>