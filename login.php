<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>

   <div class="container">

      <form action="functions/processaLogin.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Faça o seu login:</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="login" id="inputEmail" class="form-control" placeholder="login" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Password" required>
		<div class="error">
			<?php
				if (isset($_GET['erro_login'])){
					echo $_GET['erro_login'];
				}
			?>
		</div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


  <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>