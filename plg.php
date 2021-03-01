<?php 
include 'functions/range.php';

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];


    //Création de la liste des fichier à lire
    
    //création liste de date avec format par defaut du navigateur.
    $file_date_array = format_date_array($start_date,$end_date);
    /*
    foreach ($file_date_array as $key => $value) {
        echo $key . ' => ' . $value . "<br>";
    }
    */
    
?>