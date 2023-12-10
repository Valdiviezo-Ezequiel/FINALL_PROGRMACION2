<?PHP 
$categorias = (new Categoria())->listaCompletaCategoria();
$generos = (new Generos())->listaCompletaGeneros();
$disciplinas = (new Disciplinas())->listaCompletaDisciplinas();
?>

<div class="row p-5 d-flex align-items-center">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Agregar un nuevo producto</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="actions/add_producto_acc.php" method="POST" enctype="multipart/form-data">


                <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="col-md-6 mb-3">
					<label for="categoria_id" class="form-label">Categorias</label>
					<select class="form-select" name="categoria_id" id="categoria_id" required>
						<option value="" selected disabled>Elija una opción</option>
						<?PHP foreach ($categorias as $P) { ?>
							<option value="<?= $P->getId() ?>"><?= $P->getCategorias() ?></option>
						<?PHP } ?>
					</select>
				</div>

                <div class="col-md-6 mb-3">
					<label for="genero_id" class="form-label">Generos</label>
					<select class="form-select" name="genero_id" id="genero_id" required>
						<option value="" selected disabled>Elija una opción</option>
						<?PHP foreach ($generos as $P) { ?>
							<option value="<?= $P->getId() ?>"><?= $P->getGeneros() ?></option>
						<?PHP } ?>
					</select>
				</div>

                <div class="col-md-6 mb-3">
					<label for="disciplinas_id" class="form-label">Disciplinas</label>
					<select class="form-select" name="disciplinas_id" id="disciplinas_id" required>
						<option value="" selected disabled>Elija una opción</option>
						<?PHP foreach ($disciplinas as $P) { ?>
							<option value="<?= $P->getId() ?>"><?= $P->getDisciplinas() ?></option>
						<?PHP } ?>
					</select>
				</div>

                <div class="col-md-12 mb-3">
					<label for="descripcion" class="form-label">Descripcion</label>
					<textarea class="form-control" id="descripcion" name="descripcion" rows="7"></textarea>
				</div>


                <div class="col-md-6 mb-3">
                    <label for="talles" class="form-label">Talles</label>
                    <input type="text" class="form-control" id="talles" name="talles" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="color" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" id="precio" name="precio" required>
                </div>


                <div class="col-md-6 mb-3">
					<label for="fecha_lanzamiento" class="form-label">Lanzamiento</label>
					<input type="date" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento" required>
				</div>

                <div class="col-md-6 mb-3">
                    <label for="envio" class="form-label">Envio</label>
                    <input type="text" class="form-control" id="envio" name="envio" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" required>
                </div>


                <button type="submit" class="btn btn-primary">Cargar</button>

            </form>

        </div>
    </div>

</div>