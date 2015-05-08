<?php require('ToSignUpPage.php'); 
	
	include_once("../model/loadClassInstance.php");
	
	$idAuteur= $_SESSION['idAuteur'];
	
	$soum = SoumissionDao::getList1($idAuteur);

?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Articles soumis</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
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
		
		<h2 style="margin-left:10px;">Liste des articles soumis</h2>
		
				<article class="module width_full">
		

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr>  
    				<th>Titre</th> 
    				<th>Théme</th> 
    				<th>Date de soumission</th>
                    <th>Etat</th>					
    				<th>Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
			
<?php 
	foreach ($soum as $s){
	
	$idarticle = $s->getIdArticle();
	$article  = ArticleDao::get($idarticle);

?>
			
				<tr> 
    				<td><?php echo $article->getTitre() ?></td> 
    				<td><?php echo $article->getThemePrincipal() ?></td> 
    				<td><?php echo $s->getDateSoumission() ?></td> 
					<td>
					<?php
					switch($s->getStatut())
					{
					  case 1: echo "En attente de révision";
					          break;
					  case 2: echo "En cours de révision";
					          break;
					  case 3: echo "Accepté";
					          break;
                      case 4: echo "Révisé";
					          break;							  
					}
					?>
					</td>
    				<td>
					<?php 
					if($s->getStatut()==1)
					{?>
					<a href="editArticle.php?etat=<?php echo $s->getStatut() ?>&idArticle=<?php echo $idarticle ?>&idSoum=<?php echo $s->getId() ?>"><input type="image" src="images/icn_edit.png" title="Edit"></a><a  href="control/deleteSubmissionAction.php?idSoum=<?php echo $s->getId() ?>&idArticle=<?php echo $idarticle ?>" onclick="return supprimerConf('Supprimer l\'article: <?php echo $article->getTitre();?>');"><input type="image"  src="images/icn_trash.png" title="Trash"></a>
				    <?php
					}
					?>
					</td> 
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