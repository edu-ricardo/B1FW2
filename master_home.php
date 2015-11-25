<!DOCTYPE html>
<html>
<head>
	<title>Home - Master</title>
	<?php
	    include_once('utils/libheader.php');
		
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
        <li class="active"><a href="master_home.php">Home Master <span class="sr-only">(current)</span></a></li>
        <li><a href="#ajuda">Ajuda</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="logoff-link" href="logoff.php">Logoff</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input class="form-control" placeholder="Search" type="text">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
      </form>
    </div>
  </div>
</nav>

<div class="container-fluid">

      <div class="row">
        <div class="col-md-2 sidebar">
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

          <ul class="nav nav-pills nav-stacked">
            <li <?php if ($op == -1) echo $active_class; ?> >
              <a href="master_home.php">Relatórios</a>
            </li>
            <li <?php if ($op == 1) echo $active_class; ?> >
              <a href="master_home.php?op=1">Usuarios</a>
            </li>
            <li <?php if ($op == 2) echo $active_class; ?> >
              <a href="master_home.php?op=2">Alunos</a>
            </li>
            <li <?php if ($op == 3) echo $active_class; ?> >
              <a href="master_home.php?op=3">Professores</a>
            </li>
            <li <?php if ($op == 4) echo $active_class; ?> >
              <a href="master_home.php?op=4">Curso</a>
            </li>
            <li <?php if ($op == 5) echo $active_class; ?> >
              <a href="master_home.php?op=5">Disciplina</a>
            </li>
          </ul>
        </div>

<?php
  switch ($op) {
    case 1:
        $subop = -1;
        echo "<h4>Usuarios</h4>";
        if (isset($_GET['subop'])) $subop = $_GET['subop'];
        include 'views/usuario/usuario.php';
      break;
    case 2:
        $subop = -1;
        echo "<h4>Alunos</h4>";
        if (isset($_GET['subop'])) $subop = $_GET['subop'];
        include 'views/aluno/aluno.php';
      break; 
    case 3:
        $subop = -1;
        echo "<h4>Professores</h4>";
        if (isset($_GET['subop'])) $subop = $_GET['subop'];
        include 'views/professor/professor.php';
      break;
    case 5:
        $subop = -1;
        echo "<h4>Disciplinas</h4>";
        if (isset($_GET['subop'])) $subop = $_GET['subop'];
        include 'views/disciplina/disciplina.php';
      break;
    default:
      echo "Página não criada";
      break;
  }

?>
        
      </div>


</div>

    <?php include 'utils/libscripts.php' ?>
</body>
</html>