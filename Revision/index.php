<?php 

require('showSignUp.php'); 
include_once("../model/loadClassInstance.php");


$mbrComite = unserialize($_SESSION["mbrComite"]);
$_SESSION['idMbrComite']=$mbrComite->getId();



?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Compte Membre de comité</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php require('include_js.php'); ?>

</head>


<body>

	<!--Header-->
	<?php include('showHeader.php')?>
	
	<!--Menu de navigation-->
	<?php include('showMenu.php'); ?>
	
	<section id="main" class="column">
		
		<h4 class="alert_info">Bienvenue Mr. <?php echo $mbrComite->getNom()."  ".$mbrComite->getPrenom() ;?> sur votre panneau de controle </h4>
		
		
		

		<div class="spacer"></div>
	</section>


</body>

</html>