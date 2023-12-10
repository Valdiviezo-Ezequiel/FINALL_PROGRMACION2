<?PHP
$id = $_GET['id'] ?? FALSE;
$categoria = (new Categoria())->get_x_id($id);
?>


<div class="row p-5 d-flex align-items-center">
<h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar esta categoria?</h1>
	<div class="col-6 m-auto text-center">
		

			<h2 class="fs-6">Categoria</h2>
			<p><?= $categoria->getCategorias() ?></p>

			<a href="actions/delete_categorias_acc.php?id=<?= $categoria->getId() ?>" role="button" class="d-block btn btn-sm btn-dark mt-4">Eliminar</a>
	</div>

	

</div>