<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');

//general
@$nom=$_POST["nom"];
@$prenom=$_POST["prenom"];
@$email=$_POST["email"];
@$pass=$_POST["pass"];
@$confirm=$_POST["confirm"];
@$adresse=$_POST["adresse"];
@$tel=$_POST["tel"];
@$pays=$_POST["pays"];
@$nationalite=$_POST["nationalite"];
@$institution=$_POST["institution"];
@$lab=$_POST["lab"];
@$equipe=$_POST["equipe"];
$var=date("U");
//$id=dechex($var);
$id=time().'-'.mt_rand();

//Vérification des données
if((!isset($nom))||empty($nom)||(!isset($prenom))||empty($prenom)||(!isset($email))||empty($email)||(!isset($adresse))||empty($adresse)){
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Champs obligatoire non renseigné!';
	header("location:../authorAccountSub.php");
	exit();
}

if((!isset($pass))||empty($pass)||empty($confirm)||($pass!=$confirm)){
	$_SESSION['erreur']='oui';
	$_SESSION['message']='La confirmation ne correspond pas au mot de passe!';
	header("location:../authorAccountSub.php");
	exit();
}



$auteur=new AuteurPrincipal(array('id'=>$id,'nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'cpostale'=>$adresse,'tel'=>$tel,'pays'=>$pays,
			'nationalite'=>$nationalite,'institution'=>$institution,'laboratoire'=>$lab,'equipe'=>$equipe,'pswd'=>md5($pass)));	

//Si l'auteur n'est pas deja inscrit on l'insère					
if(!AuteurPrincipalDao::isInscrit($email,md5($pass))){
	AuteurPrincipalDao::add($auteur);
	$_SESSION['saved']='oui';
}
else{
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Inscription impossible! Auteur deja inscrit.';
	header("location:../authorAccountSub.php");
	exit();
}

header("location:../authorAccountSub2.php");


?>