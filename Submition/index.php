<?php 

require('ToSignUpPage.php'); 
include_once("../model/loadClassInstance.php");


$auteur = unserialize($_SESSION["auteur"]);
$_SESSION['idAuteur']=$auteur->getId();



?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Compte Auteur</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	

</head>


<body>

	<!--Header-->
	<?php include('Header.php')?>
	
	<!--Menu de navigation-->
	<?php include('Menu.php'); ?>
	
	<section id="main" class="column">
		
		<h4 class="alert_info">Bienvenue Mr. <?php echo $auteur->getNom()."  ".$auteur->getPrenom() ;?> dans votre espace d'administration </h4>
		<h4 class="alert_info">Le menu à gauche donne accés aux différentes fonctionnalitées</h4>
		
		

		<div class="spacer"></div>
	</section>


</body>

</html>