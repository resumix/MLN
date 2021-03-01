<?php
/*
 * Moulinette comptable developpée par Mounir BOUKHARI
 * Octobre 2019 
 */
//Forcer la connexion par code pin


require 'functions/auth.php';
force_connect();


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//FR"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Interface Comptable</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.33" />
	<link rel="stylesheet" href="style.css">

	

	
</head>

<body>


	<div class=main_container>
		<div class=main_title>Interface Comptable Le Zéphyr</div>

		<!-- forms pour soumettre les fichier respectifs (réglement, facture et en fin client) -->
		<!-- premier fomulaire réglements -->
		<div class=form>	
			
			<form action="dv.php" method=POST enctype="multipart/form-data">
				<h4 class=titrebta>Selectionnez un fichier r&eacute;glement</h4>
				<input type= "file" class=inputfile value="Parcourir" name=fichier placeholder='Selectionnez un fichier'>
				<input type="submit" class=button value="Valider" name=submit>
				
				
				
			</form>
		</div>
		
		<!-- Deuxième formulaire factures -->
		<div class=form>
		
			<form action="fa.php" method=POST enctype="multipart/form-data">
				<h4 class=titrebta>Selectionnez un fichier facture</h4>
				<input type= "file" class=inputfile  value="Parcourir" name=fichier>
				<input type="submit" class=button value="Valider" name=submit>
				
				
				
			</form>

			<!-- formulaire de plage de date -->
			
				<form action="plg.php" method=POST name="Plage_date" >
					<h4>Nouvelle version de donn&eacute;</h4>
					<h4 classe=titrebta>Choisissez une plage de date.</h4>
					du : 
					<input type="date" name=start_date placeholder= <?php echo date("Y-m-d"); ?> >
					au :
					<input type="date" name=end_date max=
					<?php echo date("Y-m-d"); ?>
					
					>
					<div>
						<input type="submit" value="Validez les dates choisies" class="">
					</div>
					
				
				</form>
			

			<!-- Remarques pour les utilisateurs -->
	<p class=explic>
		<li>Fichiers r&eacute;glement commencent par DV. <br>
		<li>Fichiers factures commencent par FA.<br>
		<li>Fichiers clients commencent par CL.<br>
		<a href="logout.php">Logout</a>
		

		
	</p>	
	</div>
	
	
</body>

</html>
