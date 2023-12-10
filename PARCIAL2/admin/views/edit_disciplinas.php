<?PHP
$id = $_GET['id'] ?? FALSE;
$disciplina = (new Disciplinas())->get_x_id($id);

?>

<div class="row p-5 d-flex align-items-center">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar los datos de una disciplina</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="actions/edit_disciplinas_acc.php?id=<?= $disciplina->getId() ?>" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3 m-auto">
                    <label for="disciplinas" class="form-label">Disciplina</label>
                    <input type="text" class="form-control" id="disciplinas" name="disciplinas" value="<?= $disciplina->getDisciplinas() ?>" required>
                </div>

                <button type="submit" class="d-block btn btn-sm btn-light border border-dark rounded-2 mb-1">Editar</button>
            </form>

        </div>

    </div>
</div>