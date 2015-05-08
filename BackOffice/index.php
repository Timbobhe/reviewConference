<?php
	require('showSignIn.php');
	include_once("model/Conference.class.php");
	include_once("model/ConferenceAdmin.class.php");
	$fr_conf=ConferenceAdmin::getConference('fr');
	$en_conf=ConferenceAdmin::getConference('en');
?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Admin : Conférence</title>
	
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
			
			<h4 class="alert_info">Informations génerales sur la conférence : Ces informations seront affichés sur le site de la conférence</h4>
			
				<?php
					if(isset($_SESSION['erreur'])&&($_SESSION['erreur']=='oui')){
						$_SESSION['erreur']='non';
						if(isset($_SESSION['message'])){
							echo '<h4 class="alert_error">Erreur : '.$_SESSION['message'].'</h4>';
							$_SESSION['message']='';
						}
					}
					elseif(isset($_SESSION['saved'])&&($_SESSION['saved']=='oui')){
						echo '<h4 class="alert_success">Informations enregistrées!</h4>';
						$_SESSION['saved']='';
					}
				?>
				
				<article class="module width_full">
					<header><h3 class="tabs_involved">&nbsp;&nbsp;Informations sur la conférence</h3>
						<ul class="tabs">
							<li><a href="#tab1">Francais</a></li>
							<li><a href="#tab2">Anglais</a></li>
						</ul>
					</header>
							
					<div class="tab_container">	
								
						<!--Francais-->
						<div id="tab1" class="tab_content" style="margin: 10px 20px;color: #666;">
						
							<form method="POST" action="control/toAllAction.php?lang=fr">
								<div style="margin:auto;width:650px;">
									<article class="module width_full">
										<header>
											<h3>&nbsp;&nbsp;Informations génerales: </h3>
										</header>
										<div class="module_content">
											<p>
												<label for="nom" style="width:200px;float:left;" >Nom de la conférence : </label>
												<input type="text" name="nom" value="<?php echo $fr_conf->getNom(); ?>" size="38">
												60 caractères max.
											</p>
											<p>
												<label for="description" style="width:200px;float:left;" >Description : </label>
												<input type="text" name="description" value="<?php echo $fr_conf->getDescription(); ?>" size="38">
												100 caractères max.
											</p>
											<p>
												<label for="theme" style="width:200px;float:left;" >Thème géneral : </label>
												<input type="text" name="theme" value="<?php echo $fr_conf->getTheme(); ?>" size="38">
											</p>
											<p>
												<label for="lieu" style="width:200px;float:left;" >Lieu de la conférence : </label>
												<input type="text" name="lieu" value="<?php echo $fr_conf->getLieu(); ?>" size="38">
											</p>
										</div>
									</article>

									<article class="module width_full">
										<header>
											<h3>&nbsp;&nbsp;Dates importantes: </h3>
										</header>
										<div class="module_content">
											<p>
												<label for="date" style="width:200px;float:left;" >Date de la conférence : </label>
												<input type="text" name="date" value="<?php echo $fr_conf->getDate(); ?>" size="38">
												dd/mm/yyyy
											</p>
											<p>
												<label for="date_soumission" style="width:200px;float:left;" >Date limite de soumission : </label>
												<input type="text" name="date_soumission" value="<?php echo $fr_conf->getDatelimite(); ?>" size="38">
												dd/mm/yyyy
											</p>
											<p style="color:red;">
											</p>
										</div>
									</article>
									
									<article class="module width_full">
										<header>
											<h3>&nbsp;&nbsp;Informations de contact: </h3>
										</header>
										<div class="module_content">
											<p>
												<label for="tel" style="width:200px;float:left;" >Telephone : </label>
												<input type="text" name="tel" value="<?php echo $fr_conf->getTel(); ?>" size="38">
											</p>
											<p>
												<label for="fax" style="width:200px;float:left;" >Fax : </label>
												<input type="text" name="fax" value="<?php echo $fr_conf->getFax(); ?>" size="38">
											</p>
											<p>
												<label for="pays" style="width:200px;float:left;" >Pays : </label>
												<input type="text" name="pays" value="<?php echo $fr_conf->getPays(); ?>" size="38">
											</p>
											<p>
												<label for="zip" style="width:200px;float:left;" >Code postal : </label>
												<input type="text" name="zip" value="<?php echo $fr_conf->getCodepostale(); ?>" size="38">
											</p>
										</div>
									</article>
									
									<div class="submit_link">
										<input type="submit" name="valider" value="Valider le formulaire français" class="alt_btn">
									</div>									
									<br /><br />
							
								</div>
							</form>
						</div>
						
						<!--Anglais-->
						<div id="tab2" class="tab_content" style="margin: 10px 20px;color: #666;">
						
							<form method="POST" action="control/toAllAction.php?lang=en">
								<div style="margin:auto;width:650px;">
									<article class="module width_full">
										<header>
											<h3>&nbsp;&nbsp;Informations génerales: </h3>
										</header>
										<div class="module_content">
											<p>
												<label for="nom" style="width:200px;float:left;" >Nom de la conférence : </label>
												<input type="text" name="nom" value="<?php echo $en_conf->getNom(); ?>" size="38">
												60 caractères max.
											</p>
											<p>
												<label for="description" style="width:200px;float:left;" >Description : </label>
												<input type="text" name="description" value="<?php echo $en_conf->getDescription(); ?>" size="38">
												100 caractères max.
											</p>
											<p>
												<label for="theme" style="width:200px;float:left;" >Thème géneral : </label>
												<input type="text" name="theme" value="<?php echo $en_conf->getTheme(); ?>" size="38">
											</p>
											<p>
												<label for="lieu" style="width:200px;float:left;" >Lieu de la conférence : </label>
												<input type="text" name="lieu" value="<?php echo $en_conf->getLieu(); ?>" size="38">
											</p>
										</div>
									</article>

									<article class="module width_full">
										<header>
											<h3>&nbsp;&nbsp;Dates importantes: </h3>
										</header>
										<div class="module_content">
											<p>
												<label for="date" style="width:200px;float:left;" >Date de la conférence : </label>
												<input type="text" name="date" value="<?php echo $fr_conf->getDate(); ?>" size="38">
												dd/mm/yyyy
											</p>
											<p>
												<label for="date_soumission" style="width:200px;float:left;" >Date limite de soumission : </label>
												<input type="text" name="date_soumission" value="<?php echo $fr_conf->getDatelimite(); ?>" size="38">
												dd/mm/yyyy
											</p>
											<p style="color:red;">
											</p>
										</div>
									</article>
									
									<article class="module width_full">
										<header>
											<h3>&nbsp;&nbsp;Informations de contact: </h3>
										</header>
										<div class="module_content">
											<p>
												<label for="tel" style="width:200px;float:left;" >Telephone : </label>
												<input type="text" name="tel" value="<?php echo $fr_conf->getTel(); ?>" size="38">
											</p>
											<p>
												<label for="fax" style="width:200px;float:left;" >Fax : </label>
												<input type="text" name="fax" value="<?php echo $fr_conf->getFax(); ?>" size="38">
											</p>
											<p>
												<label for="pays" style="width:200px;float:left;" >Pays : </label>
												<input type="text" name="pays" value="<?php echo $en_conf->getPays(); ?>" size="38">
											</p>
											<p>
												<label for="zip" style="width:200px;float:left;" >Code postal : </label>
												<input type="text" name="zip" value="<?php echo $fr_conf->getCodepostale(); ?>" size="38">
											</p>
										</div>
									</article>
									
									<div class="submit_link">
										<input type="submit" name="valider" value="Valider le formulaire anglais" class="alt_btn">
									</div>									
									<br /><br />
							
								</div>
							</form>
						</div>
					</div>
				</article>
				
			<div class="spacer"></div>
			<br /><br /><br /><br />
		</section>


</body>

</html>