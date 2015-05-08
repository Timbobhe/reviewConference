<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');

//general
@$nom=$_POST["nom"];
@$prenom=$_POST["prenom"];
@$email=$_POST["email"];
@$adresse=$_POST["adresse"];
@$passeport=$_POST["passeport"];
@$tel=$_POST["tel"];
@$pays=$_POST["pays"];
@$nationalite=$_POST["nationalite"];
@$institution=$_POST["institution"];
@$lab=$_POST["lab"];
@$equipe=$_POST["equipe"];


//Vérification des données
if((!isset($nom))||empty($nom)||(!isset($prenom))||empty($prenom)||(!isset($email))||empty($email)||(!isset($adresse))||empty($adresse)||(!isset($passeport))||empty($passeport)){
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Champs obligatoire non renseigné!';
	header("location:../ordinaryInscriptionStep1.php");
	exit();
}


$participant=new SimpleParticipant(array('nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'cpostale'=>$adresse,'tel'=>$tel,'pays'=>$pays,
			'nationalite'=>$nationalite,'institution'=>$institution,'laboratoire'=>$lab,'equipe'=>$equipe,'numpasseport'=>$passeport));	


//Si pas deja inscrit
if(!SimpleParticipantDao::get($email)){
	$_SESSION['etape1']=serialize($participant);
	header("location:../ordinaryInscriptionStep2.php");
	exit();
}
else{
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Inscription impossible! Participant deja inscrit.';
	header("location:../ordinaryInscriptionStep1.php");
	exit();
}

header("location:../ordinaryInscriptionStep1.php");


?>