<?php include_once('servidor.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sistema de Registro PHP-MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Acceder</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errores.php'); ?>
  	<div class="input-group">
  		<label>Usuario</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Contraseña</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		¿No eres miembro? <a href="registro.php">Registrate</a>
  	</p>
  </form>
</body>
</html>
