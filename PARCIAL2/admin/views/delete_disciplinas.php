<?PHP
$id = $_GET['id'] ?? FALSE;
$disciplina = (new Disciplinas())->get_x_id($id);
?>


<div class="row p-5 d-flex align-items-center">
<h1 class="text-center mb-5 fw-bold">¿Está seguro que desea eliminar esta disciplina?</h1>
	<div class="col-6 m-auto text-center">
		

			<h2 class="fs-6">Disciplina</h2>
			<p><?= $disciplina->getDisciplinas() ?></p>

			<a href="actions/delete_disciplinas_acc.php?id=<?= $disciplina->getId() ?>" role="button" class="d-block btn btn-sm btn-dark mt-4">Eliminar</a>
	</div>

	

</div>