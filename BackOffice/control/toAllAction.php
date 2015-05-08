<?php
session_start();

include_once("../model/Conference.class.php");
include_once("../model/ConferenceAdmin.class.php");

@$lang=$_GET['lang'];

//general
@$nom=$_POST["nom"];
@$description=$_POST["description"];
@$theme=$_POST["theme"];
@$lieu=$_POST["lieu"];

//dates
@$date=$_POST["date"];
@$date_soumission=$_POST["date_soumission"];

//Contact
@$tel=$_POST["tel"];
@$fax=$_POST["fax"];
@$pays=$_POST["pays"];
@$zip=$_POST["zip"];


//Vérification des données
if((!isset($nom))||empty($nom)){
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Champs obligatoire "nom" non renseigné!';
	header("location:../index.php");
	exit();
}


//Enregistrement du fichier
$conf=new Conference(array('nom'=>$nom,'description'=>$description,'theme'=>$theme,'lieu'=>$lieu,
					'date'=>$date,'datelimite'=>$date_soumission,
					'tel'=>$tel,'fax'=>$fax,'pays'=>$pays,'codepostale'=>$zip));
					
if(ConferenceAdmin::saveConference($conf,$lang)){
	$_SESSION['saved']='oui';
}
else{
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Impossible d\'enregistrer le fichier';
}

header("location:../index.php");


?>