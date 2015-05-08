<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');

//general
@$date1=$_POST["date1"];
@$date2=$_POST["date2"];

@$participant=unserialize($_SESSION['auteurParticipant']);


//Inscription sans reservation
if(empty($date1)&&empty($date2)){	
	if(isset($participant)&&(!AuteurParticipantDao::isInscrit($participant->getId()))){//Si letape 1 est rempli est le paraticipant n'existe pas deja
		AuteurParticipantDao::add($participant);
		session_destroy();
		header("location:../authorInscriptionStep3.php");
		exit();
	}
}

$_SESSION['erreur']='oui';
$_SESSION['message']='Inscription impossible! Participant deja inscrit.';
session_destroy();
header("location:../authorAuthentification.php");


?>