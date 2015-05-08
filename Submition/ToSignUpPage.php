<?php
	session_start();

	if(!isset($_SESSION["connecte_auteur"])||$_SESSION["connecte_auteur"]!="oui"){
		header("location:signUp.php");
	}
	
	@$deconnexion=$_GET["deconnexion"];
	if($deconnexion=="oui"){
		session_destroy();
		header("location:signUp.php");
	}
?>