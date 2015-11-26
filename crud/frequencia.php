<?php
	include_once '../dbfun/conexao.php';
	$id_turma = $_POST['id_turma'];

	$sql = "select turma.id_turma, frequencia.presenca, frequencia.presenca, frequencia.id_frequencia
	from turma
	inner join aula on turma.id_turma = aula.id_turma
	inner join frequencia on frequencia.id_aula = aula.id_aula
	where turma.id_turma = $id_turma";

	if ($q = mysqli_query($con, $sql)){
		while ($res = mysqli_fetch_assoc($q)) {
			if (isset($_POST[strval($res['id_frequencia'])])){
				$id_frequencia = $res['id_frequencia'];
				$sql_update= "update frequencia set presenca = 1 where id_frequencia = $id_frequencia";
				mysqli_query($con, $sql_update) or die(mysqli_error($con));
			}else{
				$id_frequencia = $res['id_frequencia'];
				$sql_update= "update frequencia set presenca = 0 where id_frequencia = $id_frequencia";
				mysqli_query($con, $sql_update) or die(mysqli_error($con));
			}

		}
		header("location: ../master_home.php?op=7&id=$id_turma");
	}
?>