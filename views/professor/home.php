<?php
	include_once('dbfun/conexao.php');

	$sql = "select * from professor where id_usuario = ".$usuario['id_usuario'];
	$q = mysqli_query($con, $sql);
	$professor = mysqli_fetch_assoc($q);
	echo "<h2>Olá ".$professor['nome']."!</h2>";
	echo "<h4>Suas disciplinas são: </h4>";

	$sql = "select * from disciplina d inner join disciplina_professor dpr on d.id_disciplina = dpr.id_disciplina where dpr.id_professor = ".$professor['id_professor'];
	$q = mysqli_query($con, $sql);
	$i = 1;
?>
<div class="col-md-6 list-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php
	while ($res = mysqli_fetch_assoc($q)) {
		$sql_turmas = "select * from turma where id_disciplina = ".$res['id_disciplina']." and id_professor =".$professor['id_professor']."";
		//echo "$sql_turmas";
		$q_turmas = mysqli_query($con, $sql_turmas);
		$num = mysqli_num_rows($q_turmas);
?>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne">
          <?php echo $res['cod_disciplina']." - ".$res['nome'];?>
        </a>
        <span class="badge pull-right"><?php echo mysqli_num_rows($q_turmas);?></span>
      </h4>
    </div>
    <div id="<?php echo $i;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <ul class="list-group">
        	<?php
				while ($res2 = mysqli_fetch_assoc($q_turmas)){
					echo "<li class='list-group-item'>";
					echo $res2['nome'];
					echo "</li>";
				}
        	?>
        </ul>
      </div>
    </div>
  </div>



<?php
		$i++;
	}

?>
</div>