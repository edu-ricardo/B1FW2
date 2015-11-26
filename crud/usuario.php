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

	$login = '';
	if (isset($_POST['login']))
		$login = $_POST['login'];
	
	if (isset($_GET['login']))
		$login = $_GET['login'];

	$senha = '';
	if (isset($_POST['senha']))
		$senha = md5($_POST['senha']);
	
	if (isset($_GET['senha']))
		$senha = md5($_GET['senha']);

	$senha_nova = '';
	if (isset($_POST['senha']))
		$senha = md5($_POST['senha']);
	
	if (isset($_GET['senha']))
		$senha = md5($_GET['senha']);

	$nivel = '';
	if (isset($_POST['nivel']))
		$nivel = $_POST['nivel'];
	
	if (isset($_GET['nivel']))
		$nivel = $_GET['nivel'];

	$sexo = '';
	if (isset($_POST['sexo']))
		$sexo = $_POST['sexo'];
	
	if (isset($_GET['sexo']))
		$sexo = $_GET['sexo'];

	$dados = array('id' => $id, 'login' => $login, 'senha' => $senha,  'senha_nova' => $senha_nova, 'nivel' => $nivel, 'sexo' => $sexo);


	function incluir($dados)
	{
		include '../dbfun/conexao.php';

		$sql = "select * from usuario where login = '".$dados['login']."'";		
		if ( $query = mysqli_query($con, $sql)){
			
			if (mysqli_num_rows($query)>0){
				$erro_texto = "Login já utilizado!";
				header("location: ../master_home.php?op=1&erro=$erro_texto");				
				return;
			}
		}else{
			$erro_texto = mysqli_error($con);
			header("location: ../master_home.php?op=1&erro=$erro_texto");
			return;
		}

		$sql  = "insert into usuario (login, senha, nivel, sexo, session_id) ";
		$sql .= "values('".$dados['login']."', '".$dados['senha']."', '".$dados['nivel']."', '".$dados['sexo']."', '".md5($dados['login'].$dados['senha'])."')";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=1&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=1");	
		}
	}

	function excluir($dados)
	{
		include '../dbfun/conexao.php';

		$sql  = "delete from usuario ";
		$sql .= "where id_usuario = ".$dados['id']."";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=1&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=1");
		}
	}

	function alterar_senha($dados)
	{		
		include '../dbfun/conexao.php';

		$sql = "select * from usuario where senha = '".$dados['senha']."' and id_usuario = ".$dados['id']."";		
		if ( $query = mysqli_query($con, $sql)){
			if (mysqli_num_rows($query) == 0){
				$erro_texto = "Senha original incorreta";
				header("location: ../master_home.php?op=1&erro=$erro_texto");				
				return;
			}
		}else{
			$erro_texto = mysqli_error($con);
			header("location: ../master_home.php?op=1&erro=$erro_texto");
			return;
		}

		$sql  = "update usuario ";
		$sql .= "set senha = '".$dados['senha_nova']."' ";
		$sql .= "where id_usuario = ".$dados['id']."";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=1&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=1");
		}
	}

	function editar($dados)
	{
		include '../dbfun/conexao.php';

		$sql  = "update usuario ";
		$sql .= "set login = '".$dados['login']."', nivel = '".$dados['nivel']."', sexo = '".$dados['sexo']."' ";
		$sql .= "where id_usuario = ".$dados['id']."";
		
		if ( !mysqli_query($con, $sql)){
			$erro_texto = mysqli_error($con);

			header("location: ../master_home.php?op=1&erro=$erro_texto");
		}else{
			header("location: ../master_home.php?op=1");
		}
	}

	function getUsuario($id)
	{
		include 'dbfun/conexao.php';

		$sql = "select * from usuario where id_usuario = $id";		
		if ( $query = mysqli_query($con, $sql)){
			$res = mysqli_fetch_assoc($query);
		}
		return $res;
	}

	function getUsuarioAluno()
	{
		include 'dbfun/conexao.php';

		$sql = "select * from usuario where nivel = 'A' and ";
		$sql .= "id_usuario not in (select id_usuario from aluno)";
		
		if ( $query = mysqli_query($con, $sql)){
			return $query;
		}
	}

	function getUsuarioProfessor()
	{
		include 'dbfun/conexao.php';

		$sql = "select * from usuario where nivel = 'P' and ";
		$sql .= "id_usuario not in (select id_usuario from professor)";
		if ( $query = mysqli_query($con, $sql)){
			return $query;
		}
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