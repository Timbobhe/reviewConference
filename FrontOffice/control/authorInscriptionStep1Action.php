<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');

//general
@$passeport=$_POST["passeport"];
@$idArticle=$_POST["article"];
@$auteur=unserialize($_SESSION['auteur']);

//Vérification des données
if((!isset($passeport))||empty($passeport)){
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Champs obligatoire non renseigné!';
	header("location:../authorInscriptionStep1.php");
	exit();
}

//Remplissage de l'objet auteur participant a terminer
$participant=new AuteurParticipant(array('id'=>$auteur->getId(),'idArticle'=>$idArticle,'numpasseport'=>$passeport));	

$_SESSION['auteurParticipant']=serialize($participant);

header("location:../authorInscriptionStep2.php");


?>