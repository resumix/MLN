<?php 

session_start();
//unset($_SESSION['con_stat']);
session_destroy();
header('Location: login.php');


?>