<?php
	include_once('dbfun/conexao.php');

	$sql = "select * from disciplina";
	
	if ($usuario['nivel'] == 'P'){
		$sql .= " where id_disciplina in (select id_disciplina from disciplina_professor where id_professor = (select id_professor from professor where id_usuario = ".$usuario['id_usuario']."))";
	}

	$q = mysqli_query($con, $sql);

	$num_results = mysqli_num_rows($q);

	if ($usuario['nivel'] == 'P'){
		$sql2 = "select id_professor from professor where id_usuario = ".$usuario['id_usuario'];
		$q2   = mysqli_query($con, $sql2);
		$res = mysqli_fetch_array($q2);
		$id_professor = $res['id_professor'];
	}


    switch ($usuario['nivel']) {
        case 'M':
            $pagina = 'master_home';
            break;
        case 'P':
            $pagina = 'prof_home';
            break;
        case 'A':
            $pagina = 'aluno_home';
            break;
    }

?>

<div class="col-md-10 main">
	<hr />
	<div class="table-responsive">
		<legend>Disciplinas <span class="badge"><?php echo $num_results; ?></span> </legend>
		<table class="table table-bordered table-striped table-responsive">
			<thead class="text-center">
				<tr>
					<td>código</td>
					<td>nome</td>
					<td>descrição</td>
				</tr>
			</thead>
			<tbody>
				<?php
					
					while($r = mysqli_fetch_array($q)) {
					
				?>
				<tr>
					<td><a href="<?php echo $pagina;?>.php?op=8&id=<?php echo $r['id_disciplina']; ?>"> <?php echo $r["cod_disciplina"]; ?> </a></td>
					<td><?php echo $r["nome"]; ?></td>
					<td><?php echo $r["descricao"]; ?></td>
				</tr> 				
				<?php } ?>
			</tbody>
		</table>
	</div>
	<?php
		if(isset($_GET['id'])){
			$id_disciplina = $_GET['id'];
			include 'views/notas/lancar.php';
		}
	?>
</div>