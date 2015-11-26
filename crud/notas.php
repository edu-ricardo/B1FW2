<?php
	include_once '../dbfun/conexao.php';
	$master = True;
	include_once '../functions/verificaLogin.php';
	
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

	$id_disciplina = $_POST['id_disciplina'];
	$id_turma = $_POST['id_turma'];
	
	$sql = "
	select nota.id_nota
	from disciplina
	inner join turma on turma.id_disciplina = disciplina.id_disciplina
	inner join turma_aluno on turma_aluno.id_turma = turma.id_turma
	inner join aluno on aluno.id_aluno = turma_aluno.id_aluno
	inner join nota on nota.id_disciplina = disciplina.id_disciplina and nota.id_aluno = aluno.id_aluno
	where disciplina.id_disciplina = $id_disciplina and turma.id_turma = $id_turma";
	
	if ($q = mysqli_query($con, $sql)){
		while ($res = mysqli_fetch_assoc($q)) {
			if (isset($_POST[strval($res['id_nota'])])){
				$id_nota = $res['id_nota'];
				$nota = $_POST[strval($res['id_nota'])];
				if ($nota != ''){
					$sql_update= "update nota set nota = $nota where id_nota = $id_nota";
					mysqli_query($con, $sql_update) or die(mysqli_error($con));
				}else{
					$sql_update= "update nota set nota = null where id_nota = $id_nota";
					mysqli_query($con, $sql_update) or die(mysqli_error($con));
				}
			}
		}
		header("location: ../$pagina.php?op=8&id=$id_disciplina");
	}

?>