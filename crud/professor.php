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

	$matricula = '';
	if (isset($_POST['matricula']))
		$matricula = $_POST['matricula'];
	
	if (isset($_GET['matricula']))
		$matricula = $_GET['matricula'];

	$titulacao = '';
	if (isset($_POST['titulacao']))
		$titulacao = $_POST['titulacao'];
	
	if (isset($_GET['titulacao']))
		$titulacao = $_GET['titulacao'];

	$id_usuario = -1;
	if (isset($_POST['id_usuario']))
		$id_usuario = $_POST['id_usuario'];
	
	if (isset($_GET['id_usuario']))
		$id_usuario = $_GET['id_usuario'];

	//Multiples
	$id_curso = array();
	if (isset($_POST['id_curso']))
		$id_curso = $_POST['id_curso'];		
		
	if (isset($_GET['id_curso']))
		$id_curso = $_GET['id_curso'];

	$id_disciplina = array();
	if (isset($_POST['id_disciplina']))
		$id_disciplina = $_POST['id_disciplina'];		
		
	if (isset($_GET['id_disciplina']))
		$id_disciplina = $_GET['id_disciplina'];

	$dados = array('id' => $id, 'nome' => $nome, 'matricula' => $matricula, 'titulacao' => $titulacao,  'id_usuario' => $id_usuario, 'id_curso' => $id_curso, 'id_disciplina' => $id_disciplina);
	
	function incluir($dados)
	{
		include '../dbfun/conexao.php';

		$sql = "select * from professor where matricula = '".$dados['matricula']."'";
		if ( $query = mysqli_query($con, $sql)){
			
			if (mysqli_num_rows($query)>0){
				$erro_texto = "Matricula Duplicada!";
				header("location: ../master_home.php?op=3&erro=$erro_texto");				
				return;
			}
		}else{
			$erro_texto = mysqli_error($con);
			header("location: ../master_home.php?op=3&erro=$erro_texto");
			return;
		}

		$sql  = "insert into professor (nome, matricula, titulacao, id_usuario) ";
		$sql .= "values('".$dados['nome']."', '".$dados['matricula']."', '".$dados['titulacao']."', ".$dados['id_usuario'].")";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=3&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=3");
		}

		$id_professor = getIdProfessor($dados['matricula']);

		foreach ($dados['id_curso'] as $curso) {
			$sql  = "insert into curso_professor (id_curso, id_professor) ";
			$sql .= "values('$curso', '$id_professor')";

			if ( !mysqli_query($con, $sql)){
				$erro_texto = mysqli_error($con);
				header("location: ../master_home.php?op=3&erro=$erro_texto");
			}else{
				header("location: ../master_home.php?op=3");
			}
		}

		foreach ($dados['id_disciplina'] as $disc) {
			$sql  = "insert into disciplina_professor (id_disciplina, id_professor) ";
			$sql .= "values('$disc', '$id_professor')";
		
			if ( !mysqli_query($con, $sql)){
				$erro_texto = mysqli_error($con);
				header("location: ../master_home.php?op=3&erro=$erro_texto");
			}else{
				header("location: ../master_home.php?op=3");
			}
		}
	}

	function getIdProfessor($mat)
	{
		include '../dbfun/conexao.php';

		$sql  = "select * from professor ";
		$sql .= "where matricula = '$mat'";

		if($q = mysqli_query($con, $sql)){
			$res = mysqli_fetch_array($q);
			return $res['id_professor'];
		}
	}

	function excluir($dados)
	{
		include '../dbfun/conexao.php';

		$sql  = "delete from professor ";
		$sql .= "where id_professor = ".$dados['id']."";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=3&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=3");
		}

		$sql  = "delete from curso_professor ";
		$sql .= "where id_professor = ".$dados['id']."";
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=3&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=3");
		}

		$sql  = "delete from disciplina_professor ";
		$sql .= "where id_professor = ".$dados['id']."";
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=3&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=3");
		}
	}

	function editar($dados)
	{
		include '../dbfun/conexao.php';

		$sql  = "update aluno ";
		$sql .= "set nome = '".$dados['nome']."', matricula = '".$dados['matricula']."', id_usuario = ".$dados['id_usuario']." ";
		$sql .= "where id_aluno = ".$dados['id'];
		echo "$sql";
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=3&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=3");
		}
	}


	function getUsuarioAlunoAll()
	{
		include 'dbfun/conexao.php';

		$sql = "select * from usuario where nivel = 'A'";
				
		if ( $query = mysqli_query($con, $sql)){
			return $query;
		}
	}
    
    function getAluno($id)
	{
		include 'dbfun/conexao.php';

		$sql = "select * from aluno where id_aluno = $id";		
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