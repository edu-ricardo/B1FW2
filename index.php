<!DOCTYPE html>
<html>
<?php 
    include 'dbfun/conexao.php'; 
    include 'functions/verificaLogin.php';
?>
<head>
    <title>Home - <?php echo $tipo; ?></title>
    <?php
        include 'utils/libheader.php';
    ?>
</head>
<body>

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
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i>Home</a>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i>Inbox</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
      </div>

        <a href="logoff.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-color--red">
          <i class="material-icons">close</i>
        </a>

    <?php include 'utils/libscripts.php' ?>
</body>

</html>