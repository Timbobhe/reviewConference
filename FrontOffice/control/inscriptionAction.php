<?php

//general
@$choix=$_POST["liste"];


//Vérification des données
if($choix=='normal'){
	header("location:../ordinaryInscriptionStep1.php");
	exit();
}

if($choix=='auteur'){
	header("location:../authorAuthentification.php");
	exit();
}

if($choix=='comite'){
	header("location:../memberAuthentification.php");
	exit();
}

header("location:../inscription.php");


?>