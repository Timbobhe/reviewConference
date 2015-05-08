<?php
	session_start();

	if(!isset($_SESSION["connecte"])||$_SESSION["connecte"]!="oui"){
		header("location:signIn.php");
	}
	
	@$deconnexion=$_GET["deconnexion"];
	if($deconnexion=="oui"){
		session_destroy();
		header("location:signIn.php");
	}
?>