<div class="row p-5 d-flex align-items-center">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Agregar un nuevo genero</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="actions/add_generos_acc.php" method="POST" enctype="multipart/form-data">

                <div class="col-md-6 mb-3 m-auto">
                    <label for="generos" class="form-label">Generos</label>
                    <input type="text" class="form-control" id="generos" name="generos" required>
                </div>

                <button type="submit" class="btn btn-primary">Cargar</button>

            </form>

        </div>
    </div>

</div>