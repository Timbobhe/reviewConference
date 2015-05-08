<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');

//general
@$passeport=$_POST["passeport"];
@$membre=unserialize($_SESSION['mbrComite']);


//Vérification des données
if((!isset($passeport))||empty($passeport)){
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Champs obligatoire non renseigné!';
	header("location:../memberInscriptionStep1.php");
	exit();
}

	//A terminer
	$participant=$membre;
	$participant->setParticipant(1);
	$participant->setNumpasseport($passeport);
			
	$_SESSION['membreParticipant']=serialize($participant);		
	
	header("location:../memberInscriptionStep2.php");


?>


