<!DOCTYPE html>
<html>
<head>
	<title>Home - Master</title>
	<?php
	    include_once('utils/libheader.php');
		
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
        <li class="active"><a href="#">Home Master <span class="sr-only">(current)</span></a></li>
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
          <?php
                $img_link_perfil = ($usuario['sexo'] == 'M') ? 'images/man.jpg' : 'images/woman.jpg';

                echo "<img src='$img_link_perfil' class='img-responsive img-thumbnail img-circle' width='150px' height='150px'>"
          ?>
          <br />
          <span class="small"><?php echo $usuario['login']; ?></span>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
        </div>
        <div class="col-md-10 main">
          <form action="crud/usuario.php" method="post" class="form-horizontal">
            <fieldset>
              <legend>Incluir Usuario</legend>
              <div class="form-group">
                <label class="col-md-2 control-label" for="login">login</label>
                <div class="col-md-10">
                  <input class="form-control" id="login" name="login" type="text" placeholder="login" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label" for="senha">senha</label> 
                <div class="col-md-10">
                  <input class="form-control" id="senha" name="senha" type="password" placeholder="senha" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">nivel</label>
                <div class="col-md-10">
                  <div class="radio">
                    <label>
                      <input name="nivel" id="nivel" value="M" type="radio" checked>
                      Master
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input name="nivel" id="nivel" value="P" type="radio">
                      Professor
                    </label>                    
                  </div>
                  <div class="radio">
                    <label>
                      <input name="nivel" id="nivel" value="A" type="radio">
                      Aluno
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-2 control-label">sexo</label>
                <div class="col-md-10">
                  <div class="radio">
                    <label>
                      <input name="sexo" id="sexo" value="M" type="radio" checked>
                      Masculino
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input name="sexo" id="sexo" value="F" type="radio">
                      Feminino
                    </label>
                  </div>
                </div>
              </div>
              <input type="hidden" name="operacao" value="I" />

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancel</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>

    <?php include 'utils/libscripts.php' ?>
</body>
</html>