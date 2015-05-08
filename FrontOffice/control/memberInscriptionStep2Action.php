<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');

//general
@$date1=$_POST["date1"];
@$date2=$_POST["date2"];
@$hotel=$_POST["hotel"];
@$type=$_POST["type"];
@$participant=unserialize($_SESSION['membreParticipant']);

//Inscription sans reservation
if(empty($date1)&&empty($date2)&&($hotel=='vide')&&($type=='vide')){	
	if(isset($participant)){//Si letape 1 est remplie
		ComiteParticipantDao::inscrire($participant);
		header("location:../memberInscriptionStep3.php");
		exit();
	}
}

//Inscription avec reservation : verification des données
if((!isset($date1))||empty($date1)||(!isset($date2))||empty($date2)||(!isset($hotel))||empty($hotel)||(!isset($type))||empty($type)){
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Champs obligatoire non renseigné!';
	header("location:../memberInscriptionStep2.php");
	exit();
}
//Inscription avec reservation
if(isset($participant)){//Si letape 1 est rempli est le paraticipant n'existe pas deja
	ComiteParticipantDao::inscrire($participant);
	
	$reservation=new Reservation(array('datearrive'=>$date1,'datedepart'=>$date2,'idhotel'=>$hotel,'type'=>$type,'idparticipant'=>$participant->getId()));	
	ReservationDao::reserver($reservation);
	session_destroy();
	header("location:../memberInscriptionStep3.php");
	exit();
}

$_SESSION['erreur']='oui';
$_SESSION['message']='Inscription impossible! Participant deja inscrit.';
session_destroy();
header("location:../memberAuthentification.php");


?>