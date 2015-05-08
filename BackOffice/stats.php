<?php
require('showSignIn.php'); 
require_once 'model/AdminStatistique.class.php';
@session_start();
?>

<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Panneau d'administration</title>
	
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
		
		<h4 class="alert_info">Bienvenue sur le panneau d'administration de la conférence</h4>
		
		<article class="module width_full">
			<header>
				<h3>Statistiques : Articles</h3>
			</header>
			
			<div class="module_content">
				<article class="stats_graph">
				    <?php $elements=AdminStatistique::getArticleStatistiques(); 
				          $_SESSION['ArticleStat']=$elements;?>
					<img src="StatistiqueArticle.php" width="520" height="300" alt="statistique" />
				</article>
				
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Articles</p>
						<p class="overview_count"><?php echo AdminStatistique::articleSoumis();?></p>
						<p class="overview_type">Soumis</p>
						<p class="overview_count"><?php echo AdminStatistique::articleAccepte();?></p>
						<p class="overview_type">Acceptés</p>
						<p class="overview_count"><?php echo AdminStatistique::articlerefuse();?></p>
						<p class="overview_type">Refusés</p>
						<p class="overview_count"><?php echo AdminStatistique::tauxAcceptation()?>%</p>
						<p class="overview_type">Taux d'acceptation</p>
					</div>
				</article>
				<div class="clear"></div>
			</div>
			
			<footer>
				<div class="submit_link">
				</div>
			</footer>
		</article>
		<br />
		
		

		<div class="spacer"></div>
	</section>


</body>

</html>