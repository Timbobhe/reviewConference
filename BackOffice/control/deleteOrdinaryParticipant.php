<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');
$id=$_GET['id'];
$existe=SimpleParticipantDao::getById($id);
if(empty($id) || $existe==false)
{
	$_SESSION['erreur']='oui';
    $_SESSION['message']='Suppression participant simple';
	header('Location:../participantProfile.php');
}
else
{
SimpleParticipantDao::remove($existe);
$_SESSION['saved']='oui';
header('Location:../participantProfile.php');		
}  
?>