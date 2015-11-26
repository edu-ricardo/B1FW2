<?php
	 session_start();

	if (isset($_SESSION['session_id'])) {
		# code...
		include_once 'dbfun/conexao.php';
		
		$ssid = $_SESSION['session_id'];
		
		$sql  = "select * from usuario ";
		$sql .= "where session_id = '$ssid'";

		$query = mysqli_query($con, $sql);
		$rows = mysqli_num_rows($query);
		if ($rows > 0) {
			$usuario = mysqli_fetch_assoc($query);
			switch ($usuario['nivel']) {
                case 'M':
                    if (!isset($master)) header('location: master_home.php');
                    break;
                case 'P':
                    if (!isset($master)) header('location: prof_home.php');
                    break;
                case 'A':
                    if (!isset($master)) header('location: aluno_home.php');
                    break;
            }			
		}else
		{
			echo 'Session invalida: '.$_SESSION['session_id'];
			unset($_SESSION['session_id']);
			header('location: login.php');
		}
	}else{
		header('location: login.php');
		echo $_SESSION['session_id'];
	}
		
?>