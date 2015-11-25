<?php
	include_once('dbfun/conexao.php');

	$sql = "select * from curso";

	$q = mysqli_query($con, $sql);

	$num_results = mysqli_num_rows($q);
?>

<div class="col-md-10 main">
	<hr />
	<div class="table-responsive">
		<legend>Cursos <span class="badge"><?php echo $num_results; ?></span> </legend>
		<table class="table table-bordered table-striped table-responsive">
			<thead class="text-center">
				<tr>
					<td>nome</td>
					<td>periodo</td>
					<td>ações</td>
				</tr>
			</thead>
			<tbody>
				<?php
					
					while($r = mysqli_fetch_array($q)) {
					
				?>
				<tr>
					<td><?php echo $r["nome"]; ?></td>
					<td><?php echo $r["periodo"]; ?></td>
					<td >
						<a data-toggle="tooltip" data-placement="top" title="Excluir" data-original-title="Excluir" class="btn btn-sm btn-danger" href="crud/curso.php?operacao=X&id=<?php echo $r['id_curso'] ;?>">
							<i class="glyphicon glyphicon-erase "></i>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Editar" data-original-title="Editar" class="btn btn-sm btn-default" href="master_home.php?op=4&subop=3&id=<?php echo $r['id_curso'] ;?>">
							<i class="glyphicon glyphicon-edit"></i>
						</a>
					</td>					
				</tr> 				
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
