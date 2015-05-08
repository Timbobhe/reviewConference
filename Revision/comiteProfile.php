<?php
	require('showSignUp.php');
	include_once("../model/loadClassInstance.php");
	
	$mbrComite = unserialize($_SESSION["mbrComite"]);
?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Admin : Revision</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/mstyle.css" type="text/css" media="screen" />
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
			
			<h4 class="alert_info">Informations générales sur le membre de comité : Ces informatoins peuvent etre modifier </h4>
			
				<?php
					if(isset($_SESSION['saved_mbr'])&&($_SESSION['saved_mbr']=='oui')){
						echo '<h4 class="alert_success">Informations enregistrees!</h4>';
						$_SESSION['saved_mbr']='';
					}
				?>
				
				<form method="post" action="control/changeProfileAction.php">
					<div style="margin:auto;width:650px;">
						
						
						<article class="module width_full">
							<header>
								<h3>&nbsp;&nbsp;Informations d'Authentification: </h3>
							</header>
							<div class="module_content">
								<p>
									<label for="email" style="width:200px;float:left;" >Adresse Email : </label>
									<input type="text" name="email" value="<?php echo $mbrComite->getEmail(); ?>" size="38">
								</p>
								<p>
									<label for="pswd" style="width:200px;float:left;" >Mot de passe  : </label>
									<input type="password" name="pswd"   size="38">
								</p>

							</div>
						</article>
						
						<article class="module width_full">
							<header>
								<h3>&nbsp;&nbsp;Informations Personnel: </h3>
							</header>
							<div class="module_content">
								<p>
									<label for="nom" style="width:200px;float:left;" >Nom : </label>
									<input type="text" name="nom" value="<?php echo $mbrComite->getNom(); ?>" size="38">
								</p>
								<p>
									<label for="prenom" style="width:200px;float:left;" >Prénom  : </label>
									<input type="text" name="prenom" value="<?php echo $mbrComite->getPrenom(); ?>" size="38">
								</p>
								<p>
									<label for="nationalite" style="width:200px;float:left;" >Nationalite  : </label>
									<input type="text" name="nationalite" value="<?php echo $mbrComite->getNationalite(); ?>" size="38">
								</p>

							</div>
						</article>
						
						<article class="module width_full">
							<header>
								<h3>&nbsp;&nbsp;Informations Professionnel: </h3>
							</header>
							<div class="module_content">
								<p>
									<label for="institution" style="width:200px;float:left;" >Institution  : </label>
									<input type="text" name="institution" value="<?php echo $mbrComite->getInstitution(); ?>" size="38">
								</p>
								<p>
									<label for="laboratoire" style="width:200px;float:left;" >Laboratoire  : </label>
									<input type="text" name="laboratoire" value="<?php echo $mbrComite->getLaboratoire(); ?>" size="38">
								</p>
								<p>
									<label for="equipe" style="width:200px;float:left;" >Equipe de travail : </label>
									<input type="text" name="equipe" value="<?php echo $mbrComite->getEquipe(); ?>" size="38">
								</p>
								<p>
									<label for="equipe" style="width:200px;float:left;" >Théme de révision : </label>
									<input type="text" name="equipe" value="<?php echo $mbrComite->getTheme(); ?>" size="38">
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
									<input type="text" name="tel" value="<?php echo $mbrComite->getTel(); ?>" size="38">
								</p>
								<p>
									<label for="pays" style="width:200px;float:left;" >Pays : </label>
									<input type="text" name="pays" value="<?php echo $mbrComite->getPays(); ?>" size="38">
								</p>
								<p>
									<label for="cpostale" style="width:200px;float:left;" >Code postal : </label>
									<input type="text" name="cpostale" value="<?php echo $mbrComite->getCpostale(); ?>" size="38">
								</p>
							</div>
						</article>
						
						<br />
						<footer>
							<div class="submit_link">
								<input type="submit" name="valider" value="Valider" class="alt_btn">
								<input type="button" onclick="document.location.href='index.php'" value="Retour" class="return">
							</div>
						</footer>
				<input type="hidden" name="id" value="<?php echo $mbrComite->getId(); ?>">
					</div>
				</form>

			<div class="spacer"></div>
			<br /><br /><br /><br />
		</section>


</body>

</html>