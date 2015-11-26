<!DOCTYPE html>
<html>
<head>
	<title>Home - Master</title>
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
        <li <?php if (($op != 7) && ($op!=8) ) echo "class='active'"; ?> ><a href="master_home.php">Home Master <span class="sr-only">(current)</span></a></li>
        <li <?php if ($op == 7) echo "class='active'"; ?>><a href="master_home.php?op=7">Frequencias</a></li>
        <li <?php if ($op == 8) echo "class='active'"; ?>><a href="master_home.php?op=8">Notas</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="logoff-link" href="logoff.php">Logoff</a></li>
      </ul>      
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
            <li <?php if ($op == 6) echo $active_class; ?> >
              <a href="master_home.php?op=6">Turmas</a>
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
    case 4:
        $subop = -1;
        echo "<h4>Cursos</h4>";
        if (isset($_GET['subop'])) $subop = $_GET['subop'];
        include 'views/curso/curso.php';
      break;
    case 5:
        $subop = -1;
        echo "<h4>Disciplinas</h4>";
        if (isset($_GET['subop'])) $subop = $_GET['subop'];
        include 'views/disciplina/disciplina.php';
      break;
    case 6:
        $subop = -1;
        echo "<h4>Turmas</h4>";
        if (isset($_GET['subop'])) $subop = $_GET['subop'];
        include 'views/turma/turma.php';
      break;
    case 7:        
        echo "<h4>Selecione um Turma</h4>";        
        include 'views/frequencia/frequencia.php';
      break;
    case 8:        
        echo "<h4>Selecione uma Disciplina</h4>";        
        include 'views/notas/notas.php';
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