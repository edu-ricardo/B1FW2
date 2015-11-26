<div class="col-md-10">
<?php
	include_once 'dbfun/conexao.php';

	$sql_aluno = "select * from aluno where id_usuario = ".$usuario['id_usuario'];
	$q_aluno = mysqli_query($con, $sql_aluno);
	$aluno = mysqli_fetch_assoc($q_aluno);
	echo "<h2>Olá ".$aluno['nome']."!</h2>";

	$sql_turma = "
        select turma.id_turma, aluno.id_aluno, turma.id_disciplina, turma.id_curso, turma.nome, disciplina.cod_disciplina
        from aluno 
        inner join turma_aluno on aluno.id_aluno = turma_aluno.id_aluno
        inner join turma on turma.id_turma = turma_aluno.id_turma
        inner join disciplina on disciplina.id_disciplina = turma.id_disciplina
        where aluno.id_aluno = ".$aluno['id_aluno'];

    $q_turma = mysqli_query($con, $sql_turma);
    //echo "$sql_turma";
?>

<?php
	while ($turma = mysqli_fetch_assoc($q_turma)) {
		?>
		<div class="row">
		<?php
		echo "<h4>Disciplina: ".$turma['cod_disciplina']."</h4>";
		echo "Notas: <br>";
		$sql = "
			select nota
			from nota
			where nota.id_disciplina = ".$turma['id_disciplina']." and nota.id_aluno = ".$aluno['id_aluno'];
		$q_notas = mysqli_query($con, $sql);
		$total = 0;
		$i = 0;
		?>
			<div class="row">
				<?php
				while ($nota = mysqli_fetch_assoc($q_notas)) {
					$total += $nota['nota'];
					?>
					<div class="form-group col-md-3">
						<label>Nota <?php echo ++$i;?></label>
						<?php
							echo "<input class='form-control' type='text' value='".$nota['nota']."' readonly>";
						?>
					</div>
					
					<?php
					
				}
				$media = round($total/$i, 2);
				?>
			</div>
			<div class="row">
				<div class="form-group col-md-2">
					<label>Média</label>
					<?php
						echo "<input class='form-control' type='text' value='$media' readonly>";
					?>
				</div>
			</div>
		</div>
		<?php

		// Frequencia
		$sql_freq = "
			select * 
			from frequencia 
			inner join aula on aula.id_aula = frequencia.id_aula 
			where frequencia.id_aluno = ".$aluno['id_aluno']." and aula.id_turma = ".$turma['id_turma'];
		$q_freq = mysqli_query($con, $sql_freq);
		$num_aulas = mysqli_num_rows($q_freq);
		$presente=0;
		while ($freq = mysqli_fetch_assoc($q_freq)) {
			if ($freq['presenca'] == 1) {
				$presente++;
			}
		}
		echo "Presenças: $presente. Número de Aulas: $num_aulas.";
		echo "<hr />";
	}
?>	
</div>