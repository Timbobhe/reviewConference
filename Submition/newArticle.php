<?php require('ToSignUpPage.php');?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Nouveau Article</title>
	
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
	<h2 style="margin-left:10px;">Nouveau article</h2>	
<form method="post" action="control/saveArticleAction.php" enctype="multipart/form-data">
					
					<div style="margin:auto;width:650px;">
						
						<?php
					if(isset($_SESSION['erreur_nvArticle'])&&($_SESSION['erreur_nvArticle']=='oui')){
						$_SESSION['erreur_nvArticle']='non';
					
							echo '<h4 class="alert_error">'.$_SESSION['message_nvArticle'].'</h4>';
						
					}
					?>
						<article class="module width_full">
							
							<div class="module_content">
								<p>
									<label for="titre" style="width:200px;float:left;" >Titre : </label>
									<input type="text" name="titre"  size="38">
								</p>
								<p>
									<label for="langueArticle" style="width:200px;float:left;" >Langue d'Article  : </label>
									<input type="text" name="langueArticle"  size="38">
								</p>
								<p>
									<label for="themePrincipal" style="width:200px;float:left;" >Theme Principal : </label>
									<input type="text" name="themePrincipal"  size="38">
								</p>
								<p>
									<label for="themesecondaire" style="width:200px;float:left;" >Theme Secondaire  : </label>
									<input type="text" name="themesecondaire"  size="38">
								</p>
								<p>
									<label for="languePresentation" style="width:200px;float:left;" >Langue Presentation : </label>
									<input type="text" name="languePresentation"  size="38">
								</p>
								<p>
									<label for="typeParticipation" style="width:200px;float:left;" >Type Participation  : </label>
									<input type="text" name="typeParticipation"  size="38">
								</p>

						
								<p>
									<label for="nbr" style="width:200px;float:left;" >Nombre d'Auteurs Secondaires : </label>
									<select name="nbrAuteurS" style="width:250px;">
										<?php 
										  for($i=1;$i<11;$i++)
										     echo '<option>'.$i.'</option>';
										?>
										
										
									</select>
								</p>

							
								<p>
									<label for="listMotClefs" style="width:200px;float:left;" >Liste de mot-clefs : </label>
									<input type="text" name="listMotClefs"  size="38">
								</p>
								<p>
									<label for="resume" style="width:200px;float:left;" >Resume  : </label>
									<textarea name="resume"  cols="28" rows="12"></textarea>
								</p>
								<p>
									<label for="format" style="width:200px;float:left;" >Format du fichier : </label>
									<input type="text" name="format"  size="38">
								</p>
								<p>
									<label for="file" style="width:200px;float:left;" >Joindre le fichier : </label>
									<input type="file" name="article"  size="38">
								</p>

							</div>
						</article>

				<div class="spacer"></div>
				<footer>
					<div class="submit_link">
						<input type="submit" name="valider" value="Suivant" class="alt_btn">
						<input type="button" onclick="document.location.href='index.php'" value="Retour" class="return">
					</div>
				</footer>
				<div class="clear"></div>
				
		<input type="hidden" name="idarticle" value="">
		</div>
</form>
		
	
		<div class="spacer"></div>
	</section>


</body>

</html>