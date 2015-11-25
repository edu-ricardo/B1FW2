
<?php if(isset($_GET['erro'])){ ?>
	<div class="col-md-10">
		<div class="alert alert-dismissible alert-danger">
			<button type="button" class="close" data-dismiss="alert"> <i class="glyphicon glyphicon-remove-circle"></i> </button>
			<h4>Erro!</h4>
			<p>
			<?php
				echo $_GET['erro'];
			?>
			</p>
		</div>
	</div>
<?php }  ?>

<div class="col-md-10 main">
	<ul class="nav nav-pills">
		<li <?php if ($subop == -1) echo $active_class; ?>>
			<a href="master_home.php?op=1">Listar</a>
		</li>
		<li <?php if ($subop == 2) echo $active_class; ?>>
			<a href="master_home.php?op=1&subop=2">Incluir</a>
		</li>
	</ul>	
</div>

<?php

switch ($subop) {
	case -1:
		include 'listar.php';
		break;
	case 2:
		include 'incluir.php';
		break;
	case 3:
		include 'editar.php';
		break;	
	case 4:
		include 'alterar_senha.php';
		break;
	default:
		# code...
		break;
}

?>