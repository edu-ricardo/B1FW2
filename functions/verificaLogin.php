<?php
	session_start();

	if (isset($_SESSION['session_id'])) {
		# code...
		include_once('../dbfun/conexa.php');

		$sql  = "select * from usuario ";
		$sql .= "where session_id = " . $_SESSION['session_id'];

		$query = mysqli_query($con, $sql);

		if (mysqli_num_rows($query) > 0) {
			# code...
			$usuario = mysqli_fetch_assoc($query);
			if ($usuario['nivel'] == 'M'){
				header('location: home_master.php');
			}else{
				$tipo = ($usuario['nivel'] == 'P') ? 'Professor' : 'Aluno';
			}

		}else
		{
			unset($_SESSION['session_id']);
			header('location: login.php');
		}
	}else
		header('location: login.php');
?>