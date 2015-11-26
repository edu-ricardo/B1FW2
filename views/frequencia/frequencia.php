<?php
	include_once('dbfun/conexao.php');

	$sql  = "select t.id_turma, t.nome, t.dia_semana, c.nome curso, c.periodo, d.cod_disciplina ";
	$sql .= "from turma t ";
	$sql .= "inner join curso c on c.id_curso = t.id_curso ";
	$sql .= "inner join disciplina d on d.id_disciplina = t.id_disciplina";

	$q = mysqli_query($con, $sql);

	$num_results = mysqli_num_rows($q);
?>

<div class="col-md-10 main">
	<hr />
	<div class="table-responsive">
		<legend>Turmas <span class="badge"><?php echo $num_results; ?></span> </legend>
		<table class="table table-bordered table-striped table-responsive">
			<thead class="text-center">
				<tr>
					<td>nome</td>
					<td>dia</td>
					<td>curso</td>
					<td>disciplina</td>
				</tr>
			</thead>
			<tbody>
				<?php
					
					while($r = mysqli_fetch_array($q)) {
					
				?>
				<tr>
					<td><a href="master_home.php?op=7&id=<?php echo $r['id_turma']; ?>"> <?php echo $r["nome"]; ?> </a></td>
					<td><?php echo $r["dia_semana"]; ?></td>
					<td><?php echo $r["curso"]; ?></td>
					<td><?php echo $r["cod_disciplina"]; ?></td>					
				</tr> 				
				<?php } ?>
			</tbody>
		</table>
	</div>
	<hr /> 
	<?php
		if(isset($_GET['id'])){
			include 'views/frequencia/marcar.php';
		}
	?>
</div>
