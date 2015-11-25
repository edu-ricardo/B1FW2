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

	$cod_disciplina = '';
	if (isset($_POST['cod_disciplina']))
		$cod_disciplina = $_POST['cod_disciplina'];
	
	if (isset($_GET['cod_disciplina']))
		$cod_disciplina = $_GET['cod_disciplina'];

	$descricao = -1;
	if (isset($_POST['descricao']))
		$descricao = $_POST['descricao'];
	
	if (isset($_GET['descricao']))
		$descricao = $_GET['descricao'];

	$dados = array('id' => $id, 'nome' => $nome, 'cod_disciplina' => $cod_disciplina,  'descricao' => $descricao);


	function incluir($dados)
	{
		include '../dbfun/conexao.php';

		$sql = "select * from disciplina where cod_disciplina = '".$dados['cod_disciplina']."'";
		if ( $query = mysqli_query($con, $sql)){
			
			if (mysqli_num_rows($query)>0){
				$erro_texto = "Disciplina Duplicada!";
				header("location: ../master_home.php?op=5&erro=$erro_texto");				
				return;
			}
		}else{
			$erro_texto = mysqli_error($con);
			header("location: ../master_home.php?op=5&erro=$erro_texto");
			return;
		}

		$sql  = "insert into disciplina (nome, cod_disciplina, descricao) ";
		$sql .= "values('".$dados['nome']."', '".$dados['cod_disciplina']."', '".$dados['descricao']."')";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=5&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=5");
			return;
		}
	}

	function excluir($dados)
	{
		include '../dbfun/conexao.php';

		$sql  = "delete from disciplina ";
		$sql .= "where id_disciplina = ".$dados['id']."";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=5&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=5");
		}
	}

	function editar($dados)
	{
		include '../dbfun/conexao.php';

		$sql  = "update disciplina ";
		$sql .= "set cod_disciplina = '".$dados['cod_disciplina']."', descricao = '".$dados['descricao']."', nome = '".$dados['nome']."' ";
		$sql .= "where id_disciplina = ".$dados['id'];
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=5&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=5");
		}
	}
    
    function getDisciplina($id)
	{
		include 'dbfun/conexao.php';

		$sql = "select * from disciplina where id_disciplina = $id";		
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