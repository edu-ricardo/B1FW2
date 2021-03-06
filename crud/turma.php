<?php

	if (isset($_POST['operacao']))
		$operacao = $_POST['operacao'];

	if (isset($_GET['operacao']))
		$operacao = $_GET['operacao'];

	// Recupera dados
	$id = -1;
	if (isset($_POST['id']))
		$id = $_POST['id'];

	if (isset($_GET['id']))
		$id = $_GET['id'];

	$nome = '';
	if (isset($_POST['nome']))
		$nome = $_POST['nome'];
	
	if (isset($_GET['nome']))
		$nome = $_GET['nome'];

	$n_aulas = '';
	if (isset($_POST['n_aulas']))
		$n_aulas = $_POST['n_aulas'];
	
	if (isset($_GET['n_aulas']))
		$n_aulas = $_GET['n_aulas'];

	$dia_semana = '';
	if (isset($_POST['dia_semana']))
		$dia_semana = $_POST['dia_semana'];
	
	if (isset($_GET['dia_semana']))
		$dia_semana = $_GET['dia_semana'];

	$id_disciplina = -1;
	if (isset($_POST['id_disciplina']))
		$id_disciplina = $_POST['id_disciplina'];
	
	if (isset($_GET['id_disciplina']))
		$id_disciplina = $_GET['id_disciplina'];

	$id_curso = -1;
	if (isset($_POST['id_curso']))
		$id_curso = $_POST['id_curso'];
	
	if (isset($_GET['id_curso']))
		$id_curso = $_GET['id_curso'];

	$id_professor = -1;
	if (isset($_POST['id_professor']))
		$id_professor = $_POST['id_professor'];
	
	if (isset($_GET['id_professor']))
		$id_professor = $_GET['id_professor'];

	//Multiples
	$alunos = array();
	if (isset($_POST['alunos']))
		$alunos = $_POST['alunos'];		
		
	if (isset($_GET['alunos']))
		$alunos = $_GET['alunos'];

	$dados = array('id' => $id, 'nome' => $nome, 'dia_semana' => $dia_semana, 'n_aulas' => $n_aulas, 'id_disciplina' => $id_disciplina,  'id_professor' => $id_professor, 'id_curso' => $id_curso, 'alunos' => $alunos);
	
	function incluir($dados)
	{
		include '../dbfun/conexao.php';

		$sql = "select * from turma where nome = '".$dados['nome']."'";
		if ( $query = mysqli_query($con, $sql)){
			
			if (mysqli_num_rows($query)>0){
				$erro_texto = "Turma Duplicada!";
				header("location: ../master_home.php?op=6&erro=$erro_texto");				
				return;
			}
		}else{
			$erro_texto = mysqli_error($con);
			header("location: ../master_home.php?op=6&erro=$erro_texto");
			return;
		}


		$sql  = "insert into turma ( nome, id_curso, n_aulas, id_disciplina, dia_semana, id_professor) ";
		$sql .= "VALUES('".$dados['nome']."',".$dados['id_curso'].",".$dados['n_aulas']." ,".$dados['id_disciplina']." , ".$dados['dia_semana'].", ".$dados['id_professor']." )";
		echo $sql;
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);
			header("location: ../master_home.php?op=6&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=6");
		}

		$id_turma = getIdTurma($dados['nome']);

		foreach ($dados['alunos'] as $aluno) {
			$sql  = "insert into turma_aluno (id_turma, id_aluno) ";
			$sql .= "values($id_turma, $aluno)";

			if ( !mysqli_query($con, $sql)){
				$erro_texto = mysqli_error($con);
				header("location: ../master_home.php?op=6&erro=$erro_texto");
			}else{
				header("location: ../master_home.php?op=6");
			}
		}

		$alunos = $dados['alunos'];
		// Insere aulas
		for ($i=0; $i < $dados['n_aulas']; $i++) {
			$id_aula = nextIdAula();
			$sql = "insert into aula (id_aula, id_turma) values ($id_aula, $id_turma)";
			mysqli_query($con, $sql) or die(mysqli_error($con));

			foreach ($alunos as $aluno) {
				$sql = "insert into frequencia (id_aluno, id_aula) values ($aluno, $id_aula)";
				mysqli_query($con, $sql) or die(mysqli_error($con));
			}
		}

	}

	function nextIdAula()
	{
		include '../dbfun/conexao.php';
		$sql = "select coalesce(max(id_aula), 0) + 1 cod from aula";

		if($q = mysqli_query($con, $sql)){
			$res = mysqli_fetch_assoc($q);
			return $res['cod'];
		}
	}

	function getIdTurma($nome)
	{
		include '../dbfun/conexao.php';

		$sql  = "select * from turma ";
		$sql .= "where nome = '$nome'";

		if($q = mysqli_query($con, $sql)){
			$res = mysqli_fetch_array($q);
			return $res['id_turma'];
		}
	}

	function excluir($dados)
	{
		include '../dbfun/conexao.php';

		$sql  = "delete from turma ";
		$sql .= "where id_turma = ".$dados['id']."";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=6&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=6");
		}

		$sql  = "delete from turma_aluno ";
		$sql .= "where id_turma = ".$dados['id']."";
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=6&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=6");
		}


		//Frequencias
		$sql = "delete from frequencia where frequencia.id_aula in (select aula.id_aula from aula where aula.id_turma = ".$dados['id'].")";
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=6&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=6");
		}		

		$sql = "delete from aula where id_turma = ".$dados['id'];
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=6&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=6");
		}				
	}

	function editar($dados)
	{
		include '../dbfun/conexao.php';

		$sql  = "update turma ";
		$sql .= "set nome = '".$dados['nome']."', n_aulas = ".$dados['n_aulas'].", id_curso = ".$dados['id_curso'].", id_disciplina = ".$dados['id_disciplina'].", id_professor = ".$dados['id_professor'].", dia_semana = ".$dados['dia_semana']." ";
		$sql .= "where id_turma = ".$dados['id'];

		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);
			header("location: ../master_home.php?op=6&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=6");
		}

		$sql  = "delete from turma_aluno ";
		$sql .= "where id_turma = ".$dados['id']."";
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=6&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=6");
		}


		$id_turma = getIdTurma($dados['nome']);

		foreach ($dados['alunos'] as $aluno) {
			$sql  = "insert into turma_aluno (id_turma, id_aluno) ";
			$sql .= "values($id_turma, $aluno)";

			if ( !mysqli_query($con, $sql)){
				$erro_texto = mysqli_error($con);
				header("location: ../master_home.php?op=6&erro=$erro_texto");
			}else{
				header("location: ../master_home.php?op=6");
			}
		}
	}
    
    function getTurma($id)
	{
		include 'dbfun/conexao.php';

		$sql = "select * from turma where id_turma = $id";		
		if ( $query = mysqli_query($con, $sql)){
			$res = mysqli_fetch_assoc($query);
		}
		return $res;
	}

	if (!isset($operacao))
		$operacao = -1;

	switch ($operacao) {
		case 'I':
			incluir($dados);
			break;
		case 'X':
			excluir($dados);
			break;
		case 'E':
			editar($dados);
			break;
		default:			
			break;
	}
		

?>