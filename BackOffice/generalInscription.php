<?php require('showSignIn.php');
include_once(dirname (__FILE__).'/loadClassInstance.php'); ?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Admin : Inscriptions</title>
	
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
		
		<h4 class="alert_info">Administration des inscriptions</h4>
		<?php include 'controlerror.php';?>
		<article class="module width_full"  >
			<header><h3>Prix D'inscription</h3></header>
			<?php 
			$wrapper=AdminUtilitis::getPrixConference();
			?>
				<form action="control/setConferencePriceAction.php"  method="post" >
				<div class="module_content">
						<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Frais Auteur</label>
							<input type="text" style="width:92%;" name='PA' value="<?php echo $wrapper->getPrixAuteur();?>"  >
						</fieldset><div class="clear"></div>
				</div>
				<div class="module_content">
						<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Frais Membres</label>
							<input type="text" style="width:92%;" name="PM" value="<?php echo $wrapper->getPrixMembre(); ?>" >
						</fieldset><div class="clear"></div>
				</div>
				<div class="module_content">
						<fieldset style="width:48%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Frais Visiteurs</label>
							<input type="text" style="width:92%;" name="PV"  value="<?php echo $wrapper->getPrixVisiteur();?>" >
						</fieldset><div class="clear"></div>
				</div>
				<input type="submit" value="Enregistrer" class="alt_btn" style="margin-left:20px;margin-bottom:10px;" >
               </form>		
		</article><!-- end of post new article -->
		
		<div class="spacer"></div>
	</section>


</body>

</html>