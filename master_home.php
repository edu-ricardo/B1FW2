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
    <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--white mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Home</span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
            <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <div class="mdl-textfield__expandable-holder">
              <input class="mdl-textfield__input" type="text" id="search" />
              <label class="mdl-textfield__label" for="search">Pesquisar...</label>
            </div>
          </div>
          <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
            <li class="mdl-menu__item">Sobre</li>
            <li class="mdl-menu__item">Contato</li>        
          </ul>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <?php
                $img_link_perfil = ($usuario['sexo'] == 'M') ? 'images/man.jpg' : 'images/woman.jpg';

                echo "<img src='$img_link_perfil' class='demo-avatar'>"
          ?>
          <div class="demo-avatar-dropdown">
            <span><?php echo $usuario['login']; ?></span>
            <div class="mdl-layout-spacer"></div>
            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Opções</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
              <li class="mdl-menu__item"><i class="material-icons">account_circle</i> <a href="#trocar_senha" class="mdl-navigation__link">trocar senha</a></li>
              <li class="mdl-color-text--red mdl-menu__item"><i class="material-icons">close</i> <a href="logoff.php" class="mdl-color-text--red mdl-navigation__link">desconectar</a></li>
            </ul>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800 mdl-color-text--">
          <a class="mdl-navigation__link <?php if($op == -1) echo 'mdl-color--cyan-600'; ?>" href="master_home.php"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
		  <a class="mdl-navigation__link <?php if($op == 1) echo 'mdl-color--cyan-600'; ?>" href="master_home.php?op=1"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">add_box</i>Criação</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
      </div>
      <main class="mdl-layout__content mdl-color--grey-100">
	      <?php 
	      	if ($op == 1){
	      ?>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
  <div class="mdl-tabs__tab-bar">
    <a href="#usuario" class="mdl-tabs__tab is-active">Usuarios</a>
    <a href="#prof" class="mdl-tabs__tab">Professores</a>
    <a href="#alunos" class="mdl-tabs__tab">Alunos</a>
    <a href="#disciplinas" class="mdl-tabs__tab">Disciplinas</a>
  </div>
  <div class="mdl-tabs__panel is-active" id="usuario">
		<!-- Textfield with Floating Label -->
		<form action="crud/usuario.php" method="post" class="form_in_tab">
		  <input type="hidden" name="operacao" value="I" />
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" id="login" pattern="[A-Za-z0-9]+$" name="login" required/>
		    <label class="mdl-textfield__label" for="login">login...</label>
		    <span class="mdl-textfield__error">Somente letras e números. Campo Obrigatório</span>
		  </div>
		  <div class="demo-separator"></div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="password" id="senha" name="senha" required maxlength="32" />
		    <label class="mdl-textfield__label" for="senha">senha...</label>
		  </div>
		  <div class="demo-separator"></div>		  
		  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="master">
     	  	<input type="radio" id="master" class="mdl-radio__button" name="nivel" value="M" checked />
	    	<span class="mdl-radio__label">Master</span>
		  </label>
		  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="aluno">
     	  	<input type="radio" id="aluno" class="mdl-radio__button" name="nivel" value="A" />
	    	<span class="mdl-radio__label">Aluno</span>
		  </label>
		  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="professor">
     	  	<input type="radio" id="professor" class="mdl-radio__button" name="nivel" value="P" />
	    	<span class="mdl-radio__label">Professor</span>
		  </label>
		  <div class="demo-separator"></div>		  
		  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="masc">
     	  	<input type="radio" id="masc" class="mdl-radio__button" name="sexo" value="M" />
	    	<span class="mdl-radio__label">Masculino</span>
		  </label>
		  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="fem">
     	  	<input type="radio" id="fem" class="mdl-radio__button" name="sexo" value="F" />
	    	<span class="mdl-radio__label">Feminino</span>
		  </label>   		
		  <div class="demo-separator"></div>
		  <!-- Accent-colored raised button with ripple -->
  		  <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--light-blue">
		    Incluir
		  </button>		  
		</form>

  </div>
  <div class="mdl-tabs__panel" id="prof">

  </div>
  <div class="mdl-tabs__panel" id="alunos">

  </div>
  <div class="mdl-tabs__panel" id="disciplinas">

  </div>
</div>

	      	
	      <?php
	  		}
	      ?>
      </main>
    <?php include 'utils/libscripts.php' ?>
</body>
</html>