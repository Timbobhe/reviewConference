<?php
	session_start();

	if(!isset($_SESSION["connecte_membre"])||$_SESSION["connecte_membre"]!="oui"){
		header("location:signUp.php");
	}
	
	@$deconnexion=$_GET["deconnexion"];
	if($deconnexion=="oui"){
		session_destroy();
		header("location:signUp.php");
	}
?>