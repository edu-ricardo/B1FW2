<?php
	// Cria dados basicos 
	include 'conexao.php';

	$login = 'master';
	$senha = md5('master616');
	$session_id = md5($login.$senha);

	$sql  = "insert into usuario(login, senha, session_id, nivel) ";
	$sql .= "values('$login', '$senha', '$session_id', 'M')";

	$query = mysqli_query($con, $sql);
	
	$login = 'aluno';
	$senha = md5('aluno123');
	$session_id = md5($login.$senha);

	$sql  = "insert into usuario(login, senha, session_id, nivel) ";
	$sql .= "values('$login', '$senha', '$session_id', 'A')";

	$query = mysqli_query($con, $sql);
	
	$login = 'professor';
	$senha = md5('professor123');
	$session_id = md5($login.$senha);

	$sql  = "insert into usuario(login, senha, session_id, nivel) ";
	$sql .= "values('$login', '$senha', '$session_id', 'P')";

	$query = mysqli_query($con, $sql);
?>