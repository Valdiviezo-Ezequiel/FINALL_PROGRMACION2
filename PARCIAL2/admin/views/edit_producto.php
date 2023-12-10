<?PHP
$id = $_GET['id'] ?? FALSE;
$productos = (new Producto())->producto_x_id($id);

$disciplinas = (new Disciplinas())->listaCompletaDisciplinas();
$categorias = (new Categoria())->listaCompletaCategoria();
$generos = (new Generos())->listaCompletaGeneros();
?>

<div class="row p-5 d-flex align-items-center">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Editar los datos de un Producto</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3" action="actions/edit_producto_acc.php?id=<?= $productos->getId() ?>" method="POST" enctype="multipart/form-data">


            <div class="col-md-6 mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $productos->getNombre() ?>" required>
                </div>
                <!-- <div class="col-md-6 mb-3">
                    <label for="categoria_id" class="form-label">Categoria</label>
                    <input type="text" class="form-control" id="categoria_id" name="categoria_id" value="<?= $productos->getCategoria() ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="genero_id" class="form-label">Genero</label>
                    <input type="text" class="form-control" id="genero_id" name="genero_id" value="<?= $productos->getGenero() ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="disciplinas_id" class="form-label">Disciplinas</label>
                    <input type="text" class="form-control" id="disciplinas_id" name="disciplinas_id" value="<?= $productos->getDisciplina() ?>" required>
                </div> -->

                <div class="col-md-6 mb-3">
					<label for="categoria_id" class="form-label">La categoria era: <?= $productos->getCategoria() ?></label>
					<select class="form-select" name="categoria_id" id="categoria_id" required>
						<option value="" selected disabled>Elija una opción</option>
						<?PHP foreach ($categorias as $P) { ?>
							<option value="<?= $P->getId() ?>"><?= $P->getCategorias() ?></option>
						<?PHP } ?>
					</select>
				</div>

                <div class="col-md-6 mb-3">
					<label for="genero_id" class="form-label">El genero era: <?= $productos->getGenero() ?></label>
					<select class="form-select" name="genero_id" id="genero_id" required>
						<option value="" selected disabled>Elija una opción</option>
						<?PHP foreach ($generos as $P) { ?>
							<option value="<?= $P->getId() ?>"><?= $P->getGeneros() ?></option>
						<?PHP } ?>
					</select>
				</div>

                <div class="col-md-6 mb-3">
					<label for="disciplinas_id" class="form-label">La disciplina era: <?= $productos->getDisciplina() ?> </label>
					<select class="form-select" name="disciplinas_id" id="disciplinas_id" required>
						<option value="" selected disabled>Elija una opción</option>
						<?PHP foreach ($disciplinas as $P) { ?>
							<option value="<?= $P->getId() ?>"><?= $P->getDisciplinas() ?></option>
						<?PHP } ?>
					</select>
				</div>



                <div class="col-md-6 mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <textarea type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $productos->getDescripcion() ?>" required><?= $productos->getDescripcion() ?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="talles" class="form-label">Talles</label>
                    <input type="text" class="form-control" id="talles" name="talles" value="<?= $productos->getTalle() ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="color" value="<?= $productos->getColor() ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" id="precio" name="precio" value="<?= $productos->getPrecio() ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="fecha_lanzamiento" class="form-label">fecha de lanzamiento</label>
                    <input type="text" class="form-control" id="fecha_lanzamiento" name="fecha_lanzamiento" value="<?= $productos->getLanzamiento() ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="envio" class="form-label">Envio</label>
                    <input type="text" class="form-control" id="envio" name="envio" value="<?= $productos->getEnvio() ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="text" class="form-control" id="imagen" name="imagen" value="<?= $productos->getImagen() ?>" required>
                </div>
                

                <button type="submit" class="d-block btn btn-sm btn-light border border-dark rounded-2 mb-1">Editar</button>
            </form>

        </div>

    </div>
</div>