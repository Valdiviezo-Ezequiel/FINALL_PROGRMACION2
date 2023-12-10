<div class="row p-5 d-flex align-items-center">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Agregar una nueva disciplina</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="actions/add_disciplinas_acc.php" method="POST" enctype="multipart/form-data">

                <!-- <div class="col-md-6 mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="num" class="form-control" id="id" name="id" required>
                </div> -->

                <div class="col-md-6 mb-3 m-auto">
                    <label for="disciplina" class="form-label">Disciplina</label>
                    <input type="text" class="form-control" id="disciplina" name="disciplina" required>
                </div>

                <button type="submit" class="btn btn-primary">Cargar</button>

            </form>

        </div>
    </div>

</div>