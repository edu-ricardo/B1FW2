<?php
	// Cria dados basicos 
	include 'conexao.php';

	$login = 'master';
	$senha = md5('master616');
	$session_id = md5($login+$senha);

	$sql  = 'insert into usuario(login, senha, session_id, nivel) ';
	$sql += "values('$login', '$senha', '$session_id', 'M')";

	$query = mysqli_query($con, $sql);

	mysqli_close($con);
?>