<?php require('showSignUp.php'); 
	
	include_once("../model/loadClassInstance.php");
	
	$id= $_SESSION['idMbrComite'];

	$revision = RevisionDao::getList2($id);

?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Admin : Revision</title>
	
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
		
		<h4 class="alert_info">Proposition de revision </h4>
		
		<!--Contenu-->
				<article class="module width_full">
		<header><h3>Liste d'articles</h3></header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr>  
    				<th>Titre</th> 
    				<th>Theme</th> 
    				<th>Date de soumission</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
			
<?php 
	foreach ($revision as $rev){
	
	$idarticle = $rev->getIdArticle();
	$article  = ArticleDao::get($idarticle);
	$soumis = SoumissionDao::gets($article->getId());

?>
			
				<tr> 
    				<td><?php echo $article->getTitre() ?></td> 
    				<td><?php echo $article->getThemePrincipal() ?></td> 
    				<td><?php echo $soumis->getDateSoumission() ?></td> 
    				<td><a href="respondToArticle.php?idRev=<?php echo $rev->getId() ?>"><input type="image" src="images/icn_edit.png" title="Edit"></a></td> 
				</tr> 
	<?php
 }
?> 			

			</tbody> 
			</table>
			</div>
			
		</div>
		</article>
		

		<div class="spacer"></div>
	</section>


</body>

</html>