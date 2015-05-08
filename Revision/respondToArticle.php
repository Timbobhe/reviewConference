<?php require('showSignUp.php');
 
include_once("../model/loadClassInstance.php");
$revision = RevisionDao::get($_GET["idRev"]);
$article = ArticleDao::get($revision->getIdArticle());

?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Accepte Revision</title>
	
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
		
		
				<article class="module width_full">
					<header><h3>Informations Generale sur l'article</h3></header>
						<div class="module_content">

							<h2>Article</h2>
		
							<ul>
								<li><h4>Titre</h4> &nbsp;&nbsp;<?php echo $article->getTitre() ?></li>
								<li><h4>Langue</h4> &nbsp;&nbsp;<?php echo $article->getLangueArticle() ?></li>
								<li><h4>Theme principal</h4> &nbsp;&nbsp;<?php echo $article->getThemePrincipal() ?></li>
								<li><h4>Theme secondaire</h4> &nbsp;&nbsp;<?php echo $article->getThemesecondaire() ?></li>
								<li><h4>Liste mots clefs</h4> &nbsp;&nbsp;<?php echo $article->getListMotClefs() ?></li>
								<li><h4>Resume</h4> &nbsp;&nbsp;<?php echo $article->getResume() ?></li>
								<li><h4>Telecharger Article</h4> &nbsp;&nbsp;Cliquer<a href="<?php echo $article->getUrl() ?>"> ici</a></li>
								

							</ul>
						
						

						</div>
				</article><!-- end of styles article -->
				<div class="spacer"></div>
				
	
				<div class="clear"></div>
<form method="post" action="control/respondAction.php">	
	

		<article class="module width_full">
			<header><h3>Accepter / Refuser  la Revision</h3></header>
				<div class="module_content">
				
						<fieldset style="width:48%; float:left; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<select style="width:92%;" name="accepte" >
								<option value="1">Accepte</option>
								<option value="0">Refuser</option>
							</select>
						</fieldset>
						

						<fieldset style="width:100%; float:left; margin-right: 3%;">
							<label>Commentaires</label>
							<textarea rows="12" name="comment" ></textarea>
						</fieldset>
						
					<div class="clear"></div>
				</div>
			<footer>
				<div class="submit_link">
			
					<input type="submit" value="Valider" class="alt_btn">
					<input type="button" onclick="document.location.href='index.php'" value="Retour" class="return">
				</div>
			</footer>
		</article><!-- end of post new article -->
		
		
		<input type="hidden" name="idarticle" value="<?php echo $article->getId()?>">
		<input type="hidden" name="idrevision" value="<?php echo $_GET['idRev']?>">
		
</form>
		
	
		<div class="spacer"></div>
	</section>


</body>

</html>