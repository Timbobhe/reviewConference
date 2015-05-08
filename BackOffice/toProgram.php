<?php
	require('showSignIn.php');
?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Admin : Conférence</title>
	
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
			
			<h4 class="alert_info">Ces informations seront affichés sur le site de la conférence</h4>
			
				<?php
					if(isset($_SESSION['erreur'])&&($_SESSION['erreur']=='oui')){
						$_SESSION['erreur']='non';
						if(isset($_SESSION['message'])){
							echo '<h4 class="alert_error">Erreur : '.$_SESSION['message'].'</h4>';
							$_SESSION['message']='';
						}
					}
					elseif(isset($_SESSION['saved'])&&($_SESSION['saved']=='oui')){
						echo '<h4 class="alert_success">Informations enregistrées!</h4>';
						$_SESSION['saved']='';
					}
				?>
				
				<article class="module width_full">
					<header><h3 class="tabs_involved">&nbsp;&nbsp;Page programme de la conférence</h3>
						<ul class="tabs">
							<li><a href="#tab1">Francais</a></li>
							<li><a href="#tab2">Anglais</a></li>
						</ul>
					</header>
							
					<div class="tab_container">	
								
						<!--Francais-->
						<div id="tab1" class="tab_content" style="margin: 10px 20px;color: #666;">
						
							<form method="POST" action="control/toProgramAction.php?lang=fr" enctype="multipart/form-data">
								<div class="module_content">
									<fieldset>
										<label for="texte" style="width:200px;float:left;" >Details du programme : </label>
										<textarea name="texte" cols="81" rows="20" ><?php readfile('../FrontOffice/files/frProgramDetails.txt') ?></textarea>
									</fieldset>
									<fieldset>
										<label for="description" style="width:200px;float:left;" >Fichier du programme (PDF) : </label>
										<input type="file" name="fichier" size="35" />
										10Mo Max.
									</fieldset>
									<div class="submit_link">
										<input type="submit" name="valider" value="Valider le formulaire français" class="alt_btn">
									</div>
									<br /><br /><br />
								</div>
							</form>
						</div>
						
						<!--Anglais-->
						<div id="tab2" class="tab_content" style="margin: 10px 20px;color: #666;">
						
							<form method="POST" action="control/toProgramAction.php?lang=en" enctype="multipart/form-data">
								<div class="module_content">
									<fieldset>
										<label for="texte" style="width:200px;float:left;" >Details du programme : </label>
										<textarea name="texte" cols="81" rows="20" ><?php readfile('../FrontOffice/files/enProgramDetails.txt') ?></textarea>
									</fieldset>
									<fieldset>
										<label for="description" style="width:200px;float:left;" >Fichier du programme (PDF) : </label>
										<input type="file" name="fichier" size="35" />
										10Mo Max.
									</fieldset>
									<div class="submit_link">
										<input type="submit" name="valider" value="Valider le formulaire anglais" class="alt_btn">
									</div>	
									<br /><br /><br />
								</div>
							</form>
						</div>
						
					</div>
				</article>
				
			<div class="spacer"></div>
			<br /><br /><br /><br />
		</section>


</body>

</html>