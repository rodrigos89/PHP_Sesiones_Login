<?php include('servidor.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Registro</h2>
  </div>
	
  <form method="post" action="registro.php">
  	<?php include('errores.php'); ?>
  	<div class="input-group">
  	  <label>Nombres</label>
  	  <input type="text" name="fullname" value="<?php echo $fullname; ?>">
  	</div>
    <div class="input-group">
    <label>Usuario</label>
    <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
  	<div class="input-group">
  	  <label>Correo</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Contraseña</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirme contraseña</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Registrarse</button>
  	</div>
  	<p>
  		¿Ya eres miembro? <a href="login.php">Accede</a>
  	</p>
  </form>
</body>
</html>
