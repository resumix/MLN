<?php 
//array des pins utilisateurs
//$pin_array = ['125489','251006','370120'];
include 'pn.php';

$err = '';
if (!empty($_POST['password']) && in_array($_POST['password'], $pin_array)) {
    
        session_start();

		//variable flag
        $_SESSION['con_stat'] = 1;
        header('Location: index.php');
     }
	 elseif (isset($_POST['password'])) { $err = 'Identifiant invalide !';}
	 
  
	
	


//rediriger vers Index si déjà connecté:
require_once 'functions/auth.php';
if (is_connected()) {
    header('Location: index.php');
    exit();
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>login</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.33" />
	<link href="/mv2/css/style.css" rel="stylesheet">
</head>

<body>
	
	<div class="main-container">
		<img class="img-center" src="/mv2/img/logo.png" alt="Logo" width=56 height=65>
		
		
		<h1 class="h1-pad">Merci de vous identifier</h1>
		
	
		<form class="login-form" method="POST">
    
			<h4> <?php echo $err;  ?> </h4>
	
			<input class="input" name="password" type="password" placeholder="Mot de passe">
	
			<button class="input" type="submit">Validez</button>
		</form>
	</div>
		
</body>

</html>