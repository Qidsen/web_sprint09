<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect("localhost", "yvovnenko", "securepass", "sword");

// FORGOT PASSWORD
if (isset($_POST['forgot_password'])) {
	header('location: forgot.php');
}
if(isset($_POST['send_email'])) {
	$login = mysqli_real_escape_string($db, $_POST['login']);
	$email = mysqli_real_escape_string($db, $_POST['email']);

	if (empty($login)) {
  	array_push($errors, "Login is required");
  }
  if (empty($email)) {
  	array_push($errors, "Email is required");
  }

	if (count($errors) == 0) {
  	$query = "SELECT * FROM users WHERE login='$login' AND email='$email'";
  	$results = mysqli_query($db, $query);
		if(isset($_POST['send_email'])) {
			if (mysqli_num_rows($results) == 1) {
				header('location: index.php');
				$_SESSION['success'] = "Your password was sent on your email";
			}else {
				array_push($errors, "Wrong login/email combination");
			}
		}
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $login = mysqli_real_escape_string($db, $_POST['login']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($login)) {
  	array_push($errors, "Login is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['login'] = $login;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong login/password combination");
  	}
  }
}

?>
