<?php
session_start();
include_once("../../model/loadClassInstance.php");


if(!empty($_POST['pswd'])){
$donnees = array('id'=>$_POST['id'],'nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'nationalite'=>$_POST['nationalite'],
			'email'=>$_POST['email'],'cpostale'=>$_POST['cpostale'],'tel'=>$_POST['tel'],'pays'=>$_POST['pays'],
			'institution'=>$_POST['institution'],'laboratoire'=>$_POST['laboratoire'],'equipe'=>$_POST['equipe'],
			'theme'=>$_POST['theme'],'pswd'=>md5($_POST['pswd']));

$mbr = new MembreComite($donnees);

MembreComiteDao::update($mbr);
}

else{
$donnees = array('id'=>$_POST['id'],'nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'nationalite'=>$_POST['nationalite'],
			'email'=>$_POST['email'],'cpostale'=>$_POST['cpostale'],'tel'=>$_POST['tel'],'pays'=>$_POST['pays'],
			'institution'=>$_POST['institution'],'laboratoire'=>$_POST['laboratoire'],'equipe'=>$_POST['equipe'],
			'theme'=>$_POST['theme']);

$mbr = new MembreComite($donnees);

MembreComiteDao::update1($mbr);
	
	
}

$_SESSION["mbrComite"]=serialize($mbr);
$_SESSION['saved_mbr']='oui';
header("location:../comiteProfile.php");

?>