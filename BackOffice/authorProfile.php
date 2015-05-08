<?php require('showSignIn.php');
include_once("loadClassInstance.php");
include_once(dirname (__FILE__).'/loadClassInstance.php');
?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Admin : Utilisateurs</title>
	
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
		
		<h4 class="alert_info">Gestion des auteurs</h4>
		
		<!--Contenu-->
				<article class="module width_full">
		<header><h3 class="tabs_involved">Auteurs</h3>
		<ul class="tabs">
   			<li><a href="#tab1">Principaux</a></li>
    		<li><a href="#tab2">Secondaires</a></li>
		</ul>
		</header>
        <?php
        $auteursPrincipal=AuteurPrincipalDao::getList();
        $auteursSecondaire=AuteurSecondaireDao::getList();
        ?>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<th>Nom</th> 
    				<th>Prenom</th> 
    				<th>Email</th> 
    				<th>Code postale</th>
    				<th>Tel</th> 
    				<th>Pays</th>
    				<th>Equipe</th>
    				<th>Laboratoire</th>
    				<th>Institution</th>
    				<th>Action</th>    
				</tr> 
			</thead> 
			<tbody> 
			<?php foreach ($auteursPrincipal as $auteur)
			{
			?>
				<tr> 
    				<td><?php echo $auteur->getNom();?></td> 
    				<td><?php echo $auteur->getPrenom();?></td> 
    				<td><?php echo $auteur->getEmail();?></td> 
    				<td><?php echo $auteur->getCpostale();?></td>
    				<td><?php echo $auteur->getTel();?></td> 
    				<td><?php echo $auteur->getPays();?></td>
    				<td><?php echo $auteur->getEquipe();?></td>
    				<td><?php echo $auteur->getLaboratoire();?></td>
    				<td><?php echo $auteur->getInstitution();?></td> 
    				<td><a style='text-decoration:none' href='control/deleteAuthor.php?id=<?php echo $auteur->getId();?>&type=1' onclick="return supprimerConf('Supprimer l\'auteur:<?php echo $auteur->getNom().' '.$auteur->getPrenom();?>');" ><input type="image" src="images/icn_trash.png" title="Supprimer" ></a></td> 
				</tr> 
			<?php 
			}
			?>  
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
    				<th>Nom</th> 
    				<th>Prenom</th> 
    				<th>Email</th> 
    				<th>Code postale</th>
    				<th>Tel</th> 
    				<th>Pays</th>
    				<th>Equipe</th>
    				<th>Laboratoire</th>
    				<th>Institution</th>
    				<th>Action</th>
				</tr> 
			</thead> 
			<tbody> 
			<?php foreach ($auteursSecondaire as $auteur)
			{
			?>
				<tr> 
    				<td><?php echo $auteur->getNom();?></td> 
    				<td><?php echo $auteur->getPrenom();?></td> 
    				<td><?php echo $auteur->getEmail();?></td> 
    				<td><?php echo $auteur->getCpostale();?></td>
    				<td><?php echo $auteur->getTel();?></td> 
    				<td><?php echo $auteur->getPays();?></td>
    				<td><?php echo $auteur->getEquipe();?></td>
    				<td><?php echo $auteur->getLaboratoire();?></td>
    				<td><?php echo $auteur->getInstitution();?></td> 
    				<td><a style='text-decoration:none' href='control/deleteAuthor.php?id=<?php echo $auteur->getId();?>&type=2' onclick="return supprimerConf('Supprimer l\'auteur:<?php echo $auteur->getNom().' '.$auteur->getPrenom();?>');" ><input type="image" src="images/icn_trash.png" title="Supprimer" ></a></td>
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