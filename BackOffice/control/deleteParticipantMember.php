<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');
$idmembre=$_GET['id'];
$existe=MembreComiteDao::getByid($idmembre);
if(empty($idmembre) || $existe==false)
{
	$_SESSION['erreur']='oui';
    $_SESSION['message']='Suppression Membre';
	header('Location:../participantProfile.php');
}
else
{
MembreComiteDao::remove($existe);
$_SESSION['saved']='oui';
header('Location:../participantProfile.php');		
}  
?>