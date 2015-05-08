<?php
session_start();
include_once("../../model/loadClassInstance.php");

if(!empty($_POST['pswd'])){
$donnees = array('id'=>$_POST['id'],'nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'nationalite'=>$_POST['nationalite'],
			'email'=>$_POST['email'],'cpostale'=>$_POST['cpostale'],'tel'=>$_POST['tel'],'pays'=>$_POST['pays'],
			'institution'=>$_POST['institution'],'laboratoire'=>$_POST['laboratoire'],'equipe'=>$_POST['equipe'],
			'pswd'=>md5($_POST['pswd']));

$aut = new AuteurPrincipal($donnees);

AuteurPrincipalDao::update($aut);
}
else{
$donnees = array('id'=>$_POST['id'],'nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'nationalite'=>$_POST['nationalite'],
			'email'=>$_POST['email'],'cpostale'=>$_POST['cpostale'],'tel'=>$_POST['tel'],'pays'=>$_POST['pays'],
			'institution'=>$_POST['institution'],'laboratoire'=>$_POST['laboratoire'],'equipe'=>$_POST['equipe']);

$aut = new AuteurPrincipal($donnees);

AuteurPrincipalDao::update1($aut);
	
}

$_SESSION["auteur"]=serialize($aut);
$_SESSION['saved_aut']='oui';
header("location:../authorProfile.php");

?>