<!DOCTYPE html>
<html>
<head>
	<title>Home - Professor</title>
	<?php
    include_once('utils/libheader.php');

    include_once('utils/func.php');

    $active_class = "class='active'";


		$op = -1;
	    if (isset($_GET['op'])) $op = $_GET['op'];
	?>
</head>
<body>
	<?php 
	    $master = True;
	    include 'functions/verificaLogin.php'; 
	?>

<!-- Barra de navegação -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="barra">
        <span class="sr-only">Presence System</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Presence System</a>
    </div>

    <div class="collapse navbar-collapse" id="barra">
      <ul class="nav navbar-nav">
        <li <?php if (($op != 7) && ($op!=8) ) echo "class='active'"; ?> ><a href="prof_home.php">Home Professor<span class="sr-only">(current)</span></a></li>
        <li <?php if ($op == 7) echo "class='active'"; ?>><a href="prof_home.php?op=7">Frequencias</a></li>
        <li <?php if ($op == 8) echo "class='active'"; ?>><a href="prof_home.php?op=8">Notas</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="logoff-link" href="logoff.php">Logoff</a></li>
      </ul>      
    </div>
  </div>
</nav>

<div class="container-fluid">

      <div class="row">
        <div class="col-md-2 sidebar" style="height: 900px">
        <div class="panel panel-default">
          <div class="panel-heading">Perfil</div>
          <div class="panel-body">
           <?php
              $img_link_perfil = ($usuario['sexo'] == 'M') ? 'images/man.jpg' : 'images/woman.jpg';

              echo "<img src='$img_link_perfil' class='img-responsive img-thumbnail img-circle' width='150px' height='150px'>"
            ?>
            Olá, <span class="small"><?php echo $usuario['login']; ?>!</span>
          </div>
        </div>
      </div>
<?php
  switch ($op) {
    case 7:        
        echo "<h4>Selecione um Turma</h4>";        
        include 'views/frequencia/frequencia.php';
      break;
    case 8:        
        echo "<h4>Selecione uma Disciplina</h4>";
        include 'views/notas/notas.php';
      break;
    default:

        include 'views/professor/home.php';
      break;
  }

?>

</div>

    <?php include 'utils/libscripts.php' ?>
</body>
</html>