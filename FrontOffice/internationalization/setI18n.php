<?php 
 
 if(isset($_GET['lang'])){
	$lang = $_GET['lang'];
 }

 else{
	 //langue par défaut du navigateur
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2); 
 }
 

 if ($lang=='fr'){
    include('internationalization/fr_lang.php'); 
 }
 elseif ($lang=='en'){
	include('en_lang.php'); 
 }
 else{
	include('fr_lang.php');
 }
 
 //Enregistrement de la langue dans session

 $_SESSION['lang']=$lang;
 
 ?> 