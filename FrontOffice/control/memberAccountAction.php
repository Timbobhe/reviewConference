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
@$theme=$_POST["theme"];
@$tel=$_POST["tel"];
@$pays=$_POST["pays"];
@$nationalite=$_POST["nationalite"];
@$institution=$_POST["institution"];
@$lab=$_POST["lab"];
@$equipe=$_POST["equipe"];
//$var=time('U');
//$id=dechex($var);


//Vérification des données
if((!isset($nom))||empty($nom)||(!isset($prenom))||empty($prenom)||(!isset($email))||empty($email)||(!isset($adresse))||empty($adresse)||(!isset($theme))||empty($theme)){
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Champs obligatoire non renseigné!';
	header("location:../memberAccountSub.php");
	exit();
}

if((!isset($pass))||empty($pass)||empty($confirm)||($pass!=$confirm)){
	$_SESSION['erreur']='oui';
	$_SESSION['message']='La confirmation de correspond pas au mot de passe!';
	header("location:../memberAccountSub.php");
	exit();
}


//'id'=>$id,
$membre=new MembreComite(array('nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'cpostale'=>$adresse,'tel'=>$tel,'pays'=>$pays,
			'nationalite'=>$nationalite,'institution'=>$institution,'laboratoire'=>$lab,'equipe'=>$equipe,'pswd'=>md5($pass),'theme'=>$theme));	

//Si le membre n'est pas deja inscrit on l'insère					
if(!MembreComiteDao::get($email,$pass)){
	MembreComiteDao::add($membre);
	$_SESSION['saved']='oui';
}
else{
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Inscription impossible! Membre deja inscrit.';
	header("location:../memberAccountSub.php");
	exit();
}

header("location:../memberAccountSub2.php");


?>