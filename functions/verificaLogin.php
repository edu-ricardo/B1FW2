<?php
	 session_start();

	if (isset($_SESSION['session_id'])) {
		# code...
		include 'dbfun/conexao.php';
		
		$ssid = $_SESSION['session_id'];
		
		$sql  = "select * from usuario ";
		$sql .= "where session_id = '$ssid'";

		$query = mysqli_query($con, $sql);
		$rows = mysqli_num_rows($query);
		if ($rows > 0) {
			# code...
			
			$usuario = mysqli_fetch_assoc($query);
			if ($usuario['nivel'] == 'M'){
				if (!isset($master)) header('location: ../master_home.php');
			}else{
				$tipo = ($usuario['nivel'] == 'P') ? 'Professor' : 'Aluno';
			}

		}else
		{
			echo 'Session invalida: '.$_SESSION['session_id'];
			unset($_SESSION['session_id']);
			header('location: login.php');
		}
	}else{
		header('location: login.php');
		//echo $_SESSION['session_id'];
	}
		
?>