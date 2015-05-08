<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');

//general
@$date1=$_POST["date1"];
@$date2=$_POST["date2"];
@$participant=unserialize($_SESSION['etape1']);

//Inscription sans reservation
if(empty($date1)&&empty($date2)){	
	if(isset($participant)&&(!SimpleParticipantDao::get($participant->getEmail()))){//Si letape 1 est rempli est le paraticipant n'existe pas deja
		SimpleParticipantDao::inscrire($participant);
		header("location:../ordinaryInscriptionStep3.php");
		exit();
	}
}

//Inscription avec reservation : verification des données
if((!isset($date1))||empty($date1)||(!isset($date2))||empty($date2)){
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Champs obligatoire non renseigné!';
	header("location:../ordinaryInscriptionStep2.php");
	exit();
}
//Inscription avec reservation
if(isset($participant)&&(!SimpleParticipantDao::get($participant->getEmail()))){//Si letape 1 est rempli est le participant n'existe pas deja
	SimpleParticipantDao::inscrire($participant);
	
	
	$reservation=new Reservation(array('datearrive'=>$date1,'datedepart'=>$date2,'idparticipant'=>$participant->getId()));	
	ReservationDao::reserver($reservation);
	header("location:../ordinaryInscriptionStep3.php");
	exit();
}

$_SESSION['erreur']='oui';
$_SESSION['message']='Inscription impossible! Participant deja inscrit.';
header("location:../ordinaryInscriptionStep1.php");


?>