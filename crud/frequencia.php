<?php
	include_once '../dbfun/conexao.php';
	$master = True;
	include_once '../functions/verificaLogin.php';
	echo $usuario['nivel'];
    switch ($usuario['nivel']) {
        case 'M':
            $pagina = 'master_home';
            break;
        case 'P':
            $pagina = 'prof_home';
            break;
        case 'A':
            $pagina = 'aluno_home';
            break;
    }

	$id_turma = $_POST['id_turma'];

	$sql = "select turma.id_turma, frequencia.presenca, frequencia.id_frequencia
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
		header("location: ../".$pagina.".php?op=7&id=$id_turma");
	}
?>