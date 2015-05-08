<?php require('showSignIn.php'); 
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
		
		<h4 class="alert_info">Gestion des membres du comité</h4>
		
		<!--Contenu-->
				<article class="module width_full">
		<header><h3>Membres du comité</h3></header>
		<?php 
		$membres=MembreComiteDao::filtre();
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
    				<th>Theme</th>
    				<th>Action</th>    
				</tr> 
				</thead>
				<tbody> 
			<?php foreach ($membres as $membre)
			{
			?>
				<tr> 
    				<td><?php echo $membre->getNom();?></td> 
    				<td><?php echo $membre->getPrenom();?></td> 
    				<td><?php echo $membre->getEmail();?></td> 
    				<td><?php echo $membre->getCpostale();?></td>
    				<td><?php echo $membre->getTel();?></td> 
    				<td><?php echo $membre->getPays();?></td>
    				<td><?php echo $membre->getEquipe();?></td>
    				<td><?php echo $membre->getLaboratoire();?></td>
    				<td><?php echo $membre->getInstitution();?></td>
    				<td><?php echo $membre->getTheme();?></td> 
    				<td><a style='text-decoration:none' href='control/deleteMember.php?id=<?php echo $membre->getId();?>' onclick="return supprimerConf('Supprimer le membre:<?php echo $membre->getNom().' '.$membre->getPrenom();?>');" ><input type="image" src="images/icn_trash.png" title="Supprimer" ></a></td> 
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