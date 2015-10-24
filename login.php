<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="bower_components/material-design-lite/material.min.css">	
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
	<!-- Simple header with scrollable tabs. -->
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
	  <header class="mdl-layout__header">
	    <div class="mdl-layout__header-row">
	      <!-- Title -->
	      <span class="mdl-layout-title">Sistema de Controle de Aula</span>
	    </div>
	    <!-- Tabs -->
	    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
	      <a href="#sctab_login" class="mdl-layout__tab is-active">login</a>
	      <a href="#sctab_sobre" class="mdl-layout__tab">sobre</a>
	    </div>
	  </header>
	  <main class="mdl-layout__content">
	    <section class="mdl-layout__tab-panel is-active" id="sctab_login">
	      <div class="page-content">
	      	<!-- Pagina login -->	      	
			<div class="mdl-grid">
			  <div class="mdl-cell mdl-cell--4-col"></div>
			  <div class="mdl-cell mdl-cell--4-col">
			  	<div class="mdl-card mdl-shadow--4dp">
				  <div class="mdl-card__title">
				  	Login
				  </div>
				  <div class="mdl-card__supporting-text">
					<!-- Form de Login -->
					<form action="functions/processaLogin.php" method="post">
					  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					    <input class="mdl-textfield__input" type="text" id="login" name="login" />
					    <label class="mdl-textfield__label" for="login">login...</label>					    
					  </div>
					  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="password" id="senha" name="senha"/>
				    	<label class="mdl-textfield__label" for="senha">senha...</label>
					  </div>
					  <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
						login					  	
					  </button>
					</form>
				  </div>
				</div>
			  </div>
			  <div class="mdl-cell mdl-cell--4-col"></div>
			</div>
	      </div>
	    </section>
	    <section class="mdl-layout__tab-panel" id="sctab_sobre">
	      <div class="page-content">
	      	<!-- Pagina Sobre -->
	      </div>
	    </section>
	  </main>
	  <footer class="mdl-mini-footer">
		<div class="mdl-mini-footer__left-section">
			<div class="mdl-logo">Sistema de Controle de Aula</div>		    
			<ul class="mdl-mini-footer__link-list">
				<li><a href="http://github.com/edu-ricardo">by edu-ricardo</a></li>
			</ul>
		</div>
	  </footer>	  
	</div>

	<script src="bower_components/material-design-lite/material.min.js"></script>
	<script type="text/javascript" src="scriptsJS/main.js"></script>
</body>
</html>