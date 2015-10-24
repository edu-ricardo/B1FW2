<!DOCTYPE html>
<html>
<head>
	<title>Home - Master</title>
	<?php
	    include_once('utils/libheader.php');
	?>
</head>
<body>
<?php 
    $master = True;
    include 'functions/verificaLogin.php'; 
?>    
<!-- Colored FAB button with ripple -->
<a href="logoff.php" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
  <i class="material-icons">close</i>
</a>

<?php include 'utils/libscripts.php' ?>
</body>
</html>