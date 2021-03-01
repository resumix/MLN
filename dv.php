<?php
/*
 * dv.php
 * traitement des fichiers comptables générés par Winner PMS.
 *  
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
	<title>Traitement Fichiers comptables</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.33" />
	<link rel="stylesheet" href="style.css">
	
</head>

<body>
	
	
	<?php 
	
//Définition des variables 	
	
	$finaldir = 'txt/';		//dossier de destination du fichier traité
	$formatedfile = $finaldir . str_replace('.txt','.csv',basename($_FILES['fichier']['name'])); 
	$ext_verif = pathinfo(basename($_FILES['fichier']['name']), PATHINFO_EXTENSION); //servira à verifier l'extention du fichier chargé
	$fichiertmp= $_FILES['fichier']['tmp_name'];
	
	
	if ( $ext_verif !== 'txt') {
		$text_result = "Le fichier n'a pas &egrave;t&egrave; charg&egrave;
		<br>";
		echo "
		<div class=main_container>
		<div class=main_title>Interface Comptable Le Zéphyr</div>
		<div class=form>
		<h3 class=$ext_verif> $text_result </h3>";
		
	} 
	else {
		$text_result = "Votre fichier r&eacute;glement a &eacute;t&eacute; trait&eacute; avec succ&egrave;s";
		
	
		echo '<p></p>';
		fopen($formatedfile, 'w+');
	
		$fp = fopen($fichiertmp, 'r');
    while ( ($line = fgets($fp)) !== false) {
      //echo $line . "<br>";
      $seq = substr($line, 0,5); 
      $date_facture= substr($line, 32,6);
      $facture = substr($line, 15,10);
      
      //verification si le compte est 411 ou un auxiliaire
      $comptetmp = substr($line, 38,6);
      
      if(substr($comptetmp, 0,3) !=='411') { 
		  
		  $auxiliaire = substr($comptetmp, 0,6);
		  $compte = '411'; //modification compte 411
		  
		  }
		  
		elseif (substr($comptetmp, 0,3) =='411')
		
		{
			
			$compte = substr($comptetmp, 0,6);
			$auxiliaire = '';
			
			}
      
      
      $folio = ltrim(substr($line, 47,2), '0'); 
      
      //Vérification du compte si compte comptable ou auxiliaire.      
      if(substr($line, 72, 1) == 'C'){
		  
		  $credit = ltrim(str_replace('.', ',', substr($line, 73,15)), '0'); 
		  $debit = '';
		  
		  }
		  else {
			  
			$debit = ltrim(str_replace('.', ',', substr($line, 73,15)));  
			$credit = '';
			
			  }
      
    
      
      $confirmation = substr($line, 88,15); 
      
      $conline = $seq . ';' . $date_facture . ';' . $facture . ';' . $compte . ';' . $auxiliaire . ';' . $folio . ';' . $debit . ';' . $credit . ';' . $confirmation;
           
		
      file_put_contents($formatedfile,$conline.PHP_EOL, FILE_APPEND);
      
      
		}
		
//traitement réussi -> URL de téléchargement fichier DVXXXX.txt

echo "
<div class=main_container>
		<div class=main_title>Interface Comptable Le Zéphyr</div>
		<div class=form>
<h3 class=$ext_verif> $text_result </h3>
<a href='  $formatedfile '>Cliquez ici pour le t&eacute;l&eacute;charger</a><br>
<br>
<br>";	

}

	
	?>
<p>
	<a href="#top">Choisir un autre fichier</a>	
</p>
<p>
	<a href="index.php">Revenir à la page d&apos;accueil</a>	
</p>	
	
</body>

</html>
