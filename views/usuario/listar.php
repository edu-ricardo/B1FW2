<?php
	include_once('dbfun/conexao.php');

	$sql = "select * from usuario";

	$q = mysqli_query($con, $sql);

	$num_results = mysqli_num_rows($q);
?>

<div class="col-md-10 main">
	<hr />
	<div class="table-responsive">
		<legend>Usuarios <span class="badge"><?php echo $num_results; ?></span> </legend>
		<table class="table table-bordered table-striped table-responsive">
			<thead class="text-center">
				<tr>
					<td>login</td>
					<td>senha</td>
					<td>sexo</td>
					<td>nivel</td>
					<td>ações</td>
				</tr>
			</thead>
			<tbody>
				<?php
					
					while($r = mysqli_fetch_array($q)) {
					
				?>
				<tr>
					<td><?php echo $r["login"]; ?></td>
					<td>****************</td>
					<td><?php echo $r["sexo"]; ?></td>
					<td><?php echo $r["nivel"]; ?></td>
					<td >
						<a data-toggle="tooltip" data-placement="top" title="Alterar Senha" data-original-title="Excluir" class="btn btn-sm btn-danger" href="crud/usuario.php?operacao=X&id=<?php echo $r['id_usuario'] ;?>">
							<i class="glyphicon glyphicon-erase "></i>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Editar" data-original-title="Editar" class="btn btn-sm btn-default" href="master_home.php?op=1&subop=3&id=<?php echo $r['id_usuario'] ;?>">
							<i class="glyphicon glyphicon-edit"></i>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Alterar Senha" data-original-title="Alterar Senha" class="btn btn-sm btn-default" href="master_home.php?op=1&subop=4&id=<?php echo $r['id_usuario'] ;?>">
							<i class="glyphicon glyphicon-star"></i>
						</a>
					</td>					
				</tr> 
				<!-- http://localhost/b1fw2/crud/usuario.php?operacao=E&id=9 -->
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
