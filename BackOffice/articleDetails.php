<?php require('showSignIn.php'); 
include_once(dirname (__FILE__).'/loadClassInstance.php');

?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Admin : statistiques</title>
	
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
		
		<h4 class="alert_info">Détails des Articles</h4>
		
		<article class="module width_full">
			<header>
				<h3>Details: Articles</h3>
			</header>
			
					<div class="tab_container">
			<div id="tab1" class="tab_content">
			<?php 
			$articles=ArticleDao::getList();
			?>
			
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
					<th>ID</th>
    				<th>Titre</th> 
    				<th>Theme principal</th> 
    				<th>Theme secondaire</th>
    				<th>Langue</th>  
    				<th>Langue Presentation</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
			<?php 
			foreach ($articles as $article)
			{
			?>
				<tr> 
				    <td><?php echo $article->getId();?></td> 
    				<td><?php echo $article->getTitre();?></td> 
    				<td><?php echo $article->getThemePrincipal();?> </td> 
    				<td><?php echo $article->getThemesecondaire();?></td> 
    				<td><?php echo $article->getLangueArticle();?>  </td>
    				<td><?php echo $article->getLanguePresentation();?></td> 
    				<td><a style='text-decoration:none' href='control/deleteArticle.php?id=<?php echo $article->getId();?>' onclick="return supprimerConf('Supprimer l\'article:<?php echo $article->getTitre();?>');" ><input type="image" src="images/icn_trash.png" title="Supprimer" ></a></td> 
				</tr> 
			<?php
			//deleteArticle('Supprimer cette article');
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