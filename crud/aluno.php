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

	$id_usuario = -1;
	if (isset($_POST['id_usuario']))
		$id_usuario = $_POST['id_usuario'];
	
	if (isset($_GET['id_usuario']))
		$id_usuario = $_GET['id_usuario'];

	$dados = array('id' => $id, 'nome' => $nome, 'matricula' => $matricula,  'id_usuario' => $id_usuario);


	function incluir($dados)
	{
		include '../dbfun/conexao.php';

		$sql = "select * from aluno where matricula = '".$dados['matricula']."'";
		if ( $query = mysqli_query($con, $sql)){
			
			if (mysqli_num_rows($query)>0){
				$erro_texto = "Matricula Duplicada!";
				header("location: ../master_home.php?op=2&erro=$erro_texto");				
				return;
			}
		}else{
			$erro_texto = mysqli_error($con);
			header("location: ../master_home.php?op=2&erro=$erro_texto");
			return;
		}

		$sql  = "insert into aluno (nome, matricula, id_usuario) ";
		$sql .= "values('".$dados['nome']."', '".$dados['matricula']."', ".$dados['id_usuario'].")";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=2&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=2");
			return;
		}
	}

	function excluir($dados)
	{
		include '../dbfun/conexao.php';

		$sql  = "delete from aluno ";
		$sql .= "where id_aluno = ".$dados['id']."";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=2&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=2");
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

			header("location: ../master_home.php?op=2&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=2");
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
		case 'AS':
			alterar_senha($dados);
			break;	
		default:			
			break;
	}
		

?>