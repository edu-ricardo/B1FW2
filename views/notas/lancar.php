<?php
	include_once 'dbfun/conexao.php';

$sql = "
select turma.id_turma, turma.nome, disciplina.cod_disciplina
from disciplina
inner join turma on turma.id_disciplina = disciplina.id_disciplina
where disciplina.id_disciplina = $id_disciplina";

$q = mysqli_query($con, $sql);
while ($turma = mysqli_fetch_assoc($q)) {
	echo "<h3>".$turma['nome']."</h3>";
	$sql = "
	select aluno.id_aluno, aluno.nome, disciplina.n_notas
	from disciplina
	inner join turma on turma.id_disciplina = disciplina.id_disciplina
	inner join turma_aluno on turma_aluno.id_turma = turma.id_turma
	inner join aluno on aluno.id_aluno = turma_aluno.id_aluno
	where disciplina.id_disciplina = $id_disciplina and  turma.id_turma = ".$turma['id_turma'];

	if (isset($id_professor)) {
		$sql .= " and turma.id_professor = $id_professor";
	}

	$q2 = mysqli_query($con, $sql);
	// Corrige Tabela de Notas
	$alunos_turma = array();
	$j = 0;
	while ($alunos = mysqli_fetch_assoc($q2)) {
		$n_notas = $alunos['n_notas'];
		$alunos_turma[$j] = $alunos['nome'];
		$j++;

		$sql2 = "select * from nota where id_disciplina = $id_disciplina and id_aluno = ".$alunos['id_aluno'];
			
		$q3 = mysqli_query($con, $sql2);
		if(mysqli_num_rows($q3) < $alunos['n_notas']){
			$restante = $alunos['n_notas'] - mysqli_num_rows($q3);

			for ($i=0; $i < $restante; $i++) { 
				$sql_ins = "insert into nota (id_disciplina, id_aluno) values ($id_disciplina, ".$alunos['id_aluno'].")";
				mysqli_query($con, $sql_ins) or die(mysqli_error($con));
			}
		}
	}	
?>
<form method="post" action="crud/notas.php">
	<!-- Important data -->
	<input type="hidden" name="id_disciplina" value="<?php echo $id_disciplina; ?>" />
	<input type="hidden" name="id_turma" value="<?php echo $turma['id_turma']; ?>" />

	<table class="table table-responsive table-bordered table-hover">
		<thead>
			<tr>
				<td>Nome Aluno</td>
				<?php

					for ($i=0; $i < $n_notas; $i++) { 
						$i_impressao = $i +1;
						echo "<td>Nota $i_impressao</td>";
					}

				?>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($alunos_turma as $aluno) {
					echo "<tr>";
					echo "<td>$aluno</td>";

					$sql = "
					select *
					from nota 
					inner join aluno on nota.id_aluno = aluno.id_aluno
					where nota.id_disciplina = $id_disciplina and
					aluno.nome = '$aluno'";

					if ($qtable = mysqli_query($con, $sql)){
						while ($res = mysqli_fetch_assoc($qtable)) {
							echo "<td>";
								echo "<input class='form-control' type='text' name='".$res['id_nota']."' value='".$res['nota']."' />";	
							echo "</td>";					
						}
					}else
						echo mysqli_error($con);

					echo "</tr>";
				}
			?>
		</tbody>
	</table>
	<div class="form-group">
	  <button type="submit" class="btn btn-success">enviar</button>
	</div>


</form>
<?php
}

?>


