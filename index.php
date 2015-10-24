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
<a href="logoff.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--accent">
  <i class="material-icons">close</i>
</a>
<?php include 'utils/libscripts.php' ?>
</body>
</html>