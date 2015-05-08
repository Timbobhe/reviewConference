<?php require('showSignIn.php');
include_once(dirname (__FILE__).'/loadClassInstance.php');
?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Admin :Etat Révisions</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php require('include_js.php'); ?>

</head>


<body>

	<!--Header-->
	<?php include('showHeader.php');?>
	
	<!--Menu de navigation-->
	<?php include('showMenu.php'); ?>
	
	<section id="main" class="column">
		
		<h4 class="alert_info">Administration des révisions</h4>
		<?php include_once 'controlerror.php';?>
			<article class="module width_full">
			<header>
				<h3>Details:Etat revision</h3>
			</header>
			
					<div class="tab_container">
			<div id="tab1" class="tab_content">
			<?php 
			$articles=ArticleDao::getList();
			?>
			
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<th>Titre</th> 
    				<th>Theme principal</th> 
    				<th>Auteur</th>
    				<th>Membre Commite</th> 
    				<th>Etat</th> 
    				<th>Note Article</th> 
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
			<?php 
			$donnees=RevisionDao::getRevisionList();
			$etat=array('1'=>'soumis','2'=>'revision','3'=>'accepte','4'=>'rejete');
			foreach ($donnees as $revision)
			{
				
			?>
				<tr> 
    				<td><?php echo $revision->getTitre();?></td> 
    				<td><?php echo $revision->getThemePrincipal();?> </td> 
    				<td><?php echo $revision->getNomauteur().' '.$revision->getAuteurprenom();?></td>
    				<td><?php echo $revision->getNommembre().' '.$revision->getPrenommembre();?></td> 
    				<td><?php echo $etat[$revision->getStatut()];?></td> 
    				<td><?php echo $revision->getMoy() ;?></td> 
    				<td><a href="control/deleteRevision.php?id=<?php echo $revision->getId();?>"><input type="image" src="images/icn_trash.png" title="Supprimer" ></a></td> 
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