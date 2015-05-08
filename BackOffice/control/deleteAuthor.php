<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');
$type=$_GET['type'];
$idauteur=$_GET['id'];
$existe=null;
if($type==1)
{
	$existe=AuteurPrincipalDao::get($idauteur);
   if(empty($idauteur) || $existe==false)
   {
   	$_SESSION['erreur']='oui';
    $_SESSION['message']='Suppression Auteur';	
	header('Location:../authorProfile.php');
   }
   else 
   {
   	AuteurPrincipalDao::delete($existe);
   	$_SESSION['saved']='oui';
    header('Location:../authorProfile.php');
   }
}
else 
{
	$existe=AuteurSecondaireDao::get($idauteur);
    if(empty($idauteur) || $existe==false)
    {
    $_SESSION['erreur']='oui';
    $_SESSION['message']='Suppression Auteur';		
	header('Location:../authorProfile.php');
    }
    else 
    {
    	AuteurSecondaireDao::delete($existe);
    	$_SESSION['saved']='oui';
    	header('Location:../authorProfile.php');
    }
}  
?>