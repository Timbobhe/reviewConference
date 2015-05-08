<?php require('ToSignUpPage.php');
 
include_once("../model/loadClassInstance.php");

// On test l'etat de l'article :


if($_GET['etat']==2 || $_GET['etat']==6) {
	$_SESSION['etatArticle']='revision';
	header("location:submitArticle.php");
}

else{
	$_SESSION['etatArticle']='autre';
	$article = ArticleDao::get($_GET['idArticle']);	
}



?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Modifier Article</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/mstyle.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->


</head>


<body>
   <h2 style="margin-left:10px;">Modification d'article</h2>
	<!--Header-->
	<?php include('Header.php')?>
	
	<!--Menu de navigation-->
	<?php include('Menu.php'); ?>
	
	<section id="main" class="column">
		
<form method="post" action="control/editSubmissionAction.php">
					
					<div style="margin:auto;width:650px;">
						
						
						<article class="module width_full">
							
							<div class="module_content">
								<p>
									<label for="titre" style="width:200px;float:left;" >Titre : </label>
									<input type="text" name="titre" value="<?php echo $article->getTitre(); ?>" size="38">
								</p>
								<p>
									<label for="langueArticle" style="width:200px;float:left;" >Langue d'Article  : </label>
									<input type="text" name="langueArticle" value="<?php echo $article->getLangueArticle(); ?>" size="38">
								</p>
								<p>
									<label for="themePrincipal" style="width:200px;float:left;" >Theme Principal : </label>
									<input type="text" name="themePrincipal" value="<?php echo $article->getThemePrincipal(); ?>" size="38">
								</p>
								<p>
									<label for="themesecondaire" style="width:200px;float:left;" >Theme Secondaire  : </label>
									<input type="text" name="themesecondaire" value="<?php echo $article->getThemesecondaire(); ?>" size="38">
								</p>
								<p>
									<label for="languePresentation" style="width:200px;float:left;" >Langue Presentation : </label>
									<input type="text" name="languePresentation" value="<?php echo $article->getLanguePresentation(); ?>" size="38">
								</p>
								<p>
									<label for="typeParticipation" style="width:200px;float:left;" >Type Participation  : </label>
									<input type="text" name="typeParticipation" value="<?php echo $article->getTypeParticipation(); ?>" size="38">
								</p>

							
								<p>
									<label for="listMotClefs" style="width:200px;float:left;" >Liste de mot-clefs : </label>
									<input type="text" name="listMotClefs" value="<?php echo $article->getListMotClefs(); ?>" size="38">
								</p>
								<p>
									<label for="resume" style="width:200px;float:left;" >Resume  : </label>
									<textarea name="resume"  cols="28" rows="12"><?php echo $article->getResume(); ?></textarea>
								</p>
								<p>
									<label for="format" style="width:200px;float:left;" >Format du fichier : </label>
									<input type="text" name="format" value="<?php echo $article->getFormat(); ?>" size="38">
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
						<input type="submit" name="valider" value="Valider" class="alt_btn">
						<input type="button" onclick="document.location.href='submitArticle.php'" value="Retour" class="return">
					</div>
				</footer>
				<div class="clear"></div>
				
		<input type="hidden" name="idarticle" value="<?php echo $article->getId()?>">
		<input type="hidden" name="idsoum" value="<?php echo $_GET['idSoum']?>">
		</div>
</form>
		
	
		<div class="spacer"></div>
	</section>


</body>

</html>