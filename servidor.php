<?php

session_start();
    
$username = "";
$email    = "";
$fullname = "";
$errors = array(); 
$file = "usuarios.txt";

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fullname =  $_POST['fullname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password_1 = $_POST['password_1'];
  $password_2 = $_POST['password_2'];
  $existe = true;

  if (empty($username)) { array_push($errors, "Usuario es requerido");   $existe = false; }
  if (empty($email)) { array_push($errors, "Email es requerido");   $existe = false;}
  if (empty($password_1)) { array_push($errors, "Contraseña es requerida"); $existe = false;}
  if ($password_1 != $password_2) {
	array_push($errors, "Las contraseñas no son las mismas"); $existe = false;
  }

  if(file_exists($file)){
    $datosLectura = file($file);
    foreach($datosLectura as $line){
      $arreglo = explode(",", $line);
      if ($arreglo[2] == $username){
        array_push($errors, "El usuario ya existe");
        $existe = false;
      }
      if ($arreglo[1] == $email){
        array_push($errors, "El correo ya existe");
          $existe = false;
      }
    }
  } else{
    array_push($errors, "Archivo no encontrado.");
  }
  
  // Finally, register user if there are no errors in the form
  if ($existe) {
  	$password = md5($password_1);//encrypt the password before saving in the database
  	$data = "\n$fullname,$email,$username,$password";
    file_put_contents($file, $data, FILE_APPEND) or die("ERROR: No se puede escribir datos.");
  	$_SESSION['fullname'] = $fullname;
  	$_SESSION['success'] = "Has iniciado sesion";
    //echo $query;
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username)) {
  	array_push($errors, "Usuario es requerido");
  }
  if (empty($password)) {
  	array_push($errors, "Contrasena es requerida");
  }

  if(file_exists($file)){
    $existe = false;
    $datosLectura = file($file);
    foreach($datosLectura as $line){
      $arreglo = explode(",", $line);
      if ($arreglo[2] == $username and trim($arreglo[3])==md5($password)){
        $existe=true;
        $fullname = $arreglo[0];
      }
    }
    if ($existe){
    $_SESSION['fullname'] = $fullname;
    $_SESSION['success'] = "Has iniciado sesion";
    header('location: index.php');
    }else{
    array_push($errors, "Datos incorrectos.");
    }
  } else{
        array_push($errors, "ERROR: Archivo no encontrado.");
    }
  }
?>