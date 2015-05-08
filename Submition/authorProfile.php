<?php
	require('ToSignUpPage.php');
	include_once("../model/loadClassInstance.php");
	
	$auteur = unserialize($_SESSION["auteur"]);
?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Auteur Principal</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/mstyle.css" type="text/css" media="screen" />
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
			
			<h2 style="margin-left:10px;">Modification du profile</h2>
			
				<?php
					if(isset($_SESSION['saved_aut'])&&($_SESSION['saved_aut']=='oui')){
						echo '<h4 class="alert_success">Informations enregistrées!</h4>';
						$_SESSION['saved_aut']='';
					}
				?>
				
				<form method="post" action="control/changeProfileAction.php">
					<div style="margin:auto;width:650px;">
						
						
						<article class="module width_full">
							
							<div class="module_content">
								<p>
									<label for="email" style="width:200px;float:left;" >Adresse Email : </label>
									<input type="text" name="email" value="<?php echo $auteur->getEmail(); ?>" size="38">
								</p>
								<p>
									<label for="pswd" style="width:200px;float:left;" >Mot de passe  : </label>
									<input type="password" name="pswd" size="38">
								</p>

								<p>
									<label for="nom" style="width:200px;float:left;" >Nom : </label>
									<input type="text" name="nom" value="<?php echo $auteur->getNom(); ?>" size="38">
								</p>
								<p>
									<label for="prenom" style="width:200px;float:left;" >Prénom  : </label>
									<input type="text" name="prenom" value="<?php echo $auteur->getPrenom(); ?>" size="38">
								</p>
								<p>
									<label for="nationalite" style="width:200px;float:left;" >Nationalite  : </label>
									<input type="text" name="nationalite" value="<?php echo $auteur->getNationalite(); ?>" size="38">
								</p>

							
								<p>
									<label for="institution" style="width:200px;float:left;" >Institution  : </label>
									<input type="text" name="institution" value="<?php echo $auteur->getInstitution(); ?>" size="38">
								</p>
								<p>
									<label for="laboratoire" style="width:200px;float:left;" >Laboratoire  : </label>
									<input type="text" name="laboratoire" value="<?php echo $auteur->getLaboratoire(); ?>" size="38">
								</p>
								<p>
									<label for="equipe" style="width:200px;float:left;" >Equipe de travail : </label>
									<input type="text" name="equipe" value="<?php echo $auteur->getEquipe(); ?>" size="38">
								</p>

							
								<p>
									<label for="tel" style="width:200px;float:left;" >Telephone : </label>
									<input type="text" name="tel" value="<?php echo $auteur->getTel(); ?>" size="38">
								</p>
								<p>
									<label for="pays" style="width:200px;float:left;" >Pays : </label>
									<input type="text" name="pays" value="<?php echo $auteur->getPays(); ?>" size="38">
								</p>
								<p>
									<label for="cpostale" style="width:200px;float:left;" >Code postal : </label>
									<input type="text" name="cpostale" value="<?php echo $auteur->getCpostale(); ?>" size="38">
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
				<input type="hidden" name="id" value="<?php echo $auteur->getId(); ?>">
					</div>
				</form>

			<div class="spacer"></div>
			<br /><br /><br /><br />
		</section>


</body>

</html>