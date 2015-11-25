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

	$periodo = '';
	if (isset($_POST['periodo']))
		$periodo = $_POST['periodo'];
	
	if (isset($_GET['periodo']))
		$periodo = $_GET['periodo'];

	$dados = array('id' => $id, 'nome' => $nome, 'periodo' => $periodo);


	function incluir($dados)
	{
		include '../dbfun/conexao.php';

		$sql  = "insert into curso (nome, periodo) ";
		$sql .= "values('".$dados['nome']."', '".$dados['periodo']."')";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=4&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=4");
			return;
		}
	}

	function excluir($dados)
	{
		include '../dbfun/conexao.php';

		$sql  = "delete from curso ";
		$sql .= "where id_curso = ".$dados['id']."";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=4&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=4");
		}
	}

	function editar($dados)
	{
		include '../dbfun/conexao.php';

		$sql  = "update curso ";
		$sql .= "set nome = '".$dados['nome']."', periodo = '".$dados['periodo']."'";
		$sql .= "where id_curso = ".$dados['id'];
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=4&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=4");
		}
	}
    
    function getCurso($id)
	{
		include 'dbfun/conexao.php';

		$sql = "select * from curso where id_curso = $id";		
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