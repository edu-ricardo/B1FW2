<?php
	include_once 'dbfun/conexao.php';

$sql = "select n_aulas from turma where id_turma = $id_turma";
if ($q = mysqli_query($con, $sql)) {
	$res = mysqli_fetch_assoc($q);
	$n_aulas = $res['n_aulas'];
}else
	echo mysqli_error($con);


// Recupera alunos por turma
$sql = "
select turma.id_turma,aluno.id_aluno, aluno.nome
from turma
inner join turma_aluno on turma_aluno.id_turma = turma.id_turma
inner join aluno on aluno.id_aluno = turma_aluno.id_aluno
where turma.id_turma = $id_turma
";

if ($q = mysqli_query($con, $sql)) {
	
	$alunos_turma = array();
	$i = 0;
	while ($res = mysqli_fetch_assoc($q)){
		$alunos_turma[$i] = $res['nome'];
		$i++;
	}
}else
	echo mysqli_error($con);

?>

<form method="post" action="crud/frequencia.php">
<!-- Important data -->
<input type="hidden" name="id_turma" value="<?php echo $id_turma; ?>" />

<table class="table table-responsive table-bordered table-hover">
	<thead>
		<tr>
			<td>Nome Aluno</td>
			<?php

				for ($i=0; $i < $n_aulas; $i++) { 
					$i_impressao = $i +1;
					echo "<td>Aula $i_impressao</td>";
				}

			?>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($alunos_turma as $aluno) {
				echo "<tr>";
				echo "<td>$aluno</td>";
				$sql = "select turma.id_turma, frequencia.id_frequencia, frequencia.presenca
						from turma
						inner join aula on turma.id_turma = aula.id_turma
						inner join frequencia on frequencia.id_aula = aula.id_aula
						inner join aluno on aluno.id_aluno = frequencia.id_aluno
						where turma.id_turma = $id_turma and aluno.nome = '$aluno'";

				if ($q = mysqli_query($con, $sql)){
					while ($res = mysqli_fetch_assoc($q)) {
						echo "<td>";
							echo "<input type='checkbox' name='".$res['id_frequencia']."' ";
							if ($res['presenca'] == 1) echo "checked";
							echo " />";	
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