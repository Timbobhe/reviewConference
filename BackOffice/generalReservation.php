<?php
require('showSignIn.php'); 
require_once 'model/AdminStatistique.class.php';
@session_start();
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Panneau d'administration</title>
	
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
		
		<h4 class="alert_info">Bienvenue sur le panneau d'administration de la conférence</h4>
		
		<article class="module width_full">
			<header>
				<h3>Administration des Reservation</h3>
			</header>
			<div class="module_content">
	            <?php 
	            $reservation=ReservationDao::getList();
	            ?>
	            	<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
				<thead> 
				<tr> 
    				<th>Hotel</th> 
    				<th>Type</th> 
    				<th>Participant</th> 
    				<th>Date arrivee</th>
    				<th>Date depart</th> 
    				<th>Reservation</th>
				</tr> 
				</thead>
				<tbody> 
			
			</tbody> 
			</table>
			</div>
			
		</div>
	
				<div class="clear"></div>
			</div>
			
		</article>
		<br />
		<div class="spacer"></div>
	</section>


</body>

</html>