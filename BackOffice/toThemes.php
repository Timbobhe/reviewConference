<?php
	require('showSignIn.php');
	include_once("model/Conference.class.php");
	include_once("model/ConferenceAdmin.class.php");
	$fr_conf=ConferenceAdmin::getConference('fr');
	$en_conf=ConferenceAdmin::getConference('en');
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
			<h4 class="alert_info">Vous avez droit d'ajouter jusqu'a trois sous thèmes!</h4>
			
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
					<header><h3 class="tabs_involved">&nbsp;&nbsp;Page Thèmes</h3>
						<ul class="tabs">
							<li><a href="#tab1">Francais</a></li>
							<li><a href="#tab2">Anglais</a></li>
						</ul>
					</header>
							
					<div class="tab_container">	
								
						<!--Francais-->
						<div id="tab1" class="tab_content" style="margin: 10px 20px;color: #666;">
						
							<form method="POST" action="control/toThemesAction.php?lang=fr">
								
								<article class="module width_full">
									<header>
										<h3>&nbsp;&nbsp; Thème principal: </h3>
									</header>
									<div class="module_content">
										<fieldset>
											<label for="nom" style="width:150px;float:left;" >Nom du Thème : </label>
											<input type="text" name="nom" value="<?php echo $fr_conf->getTheme(); ?>" size="38">
											60 caractères max.
										</fieldset>
										<fieldset>
											<label for="texte" style="width:150px;float:left;" >Description : </label>
											<textarea name="texte" cols="70" rows="15" ><?php readfile('../FrontOffice/files/frLeadingTheme.txt') ?></textarea>
										</fieldset>
									</div>
								</article>
								
								<article class="module width_full">
									<?php
										$str=file_get_contents('../FrontOffice/files/frSubTheme1.txt');
										$tab1=explode(':::',$str);
									?>
									<header>
										<h3>&nbsp;&nbsp; Thème 1: </h3>
									</header>
									<div class="module_content">
										<fieldset>
											<label for="nom1" style="width:150px;float:left;" >Nom du Thème : </label>
											<input type="text" name="nom1" value="<?php echo $tab1[0];?>" size="38">
											60 caractères max.
										</fieldset>
										<fieldset>
											<label for="texte1" style="width:150px;float:left;" >Description : </label>
											<textarea name="texte1" cols="70" rows="15" value=""><?php echo $tab1[1];?></textarea>
										</fieldset>
									</div>
								</article>
								
								<article class="module width_full">
									<?php
										$str=file_get_contents('../FrontOffice/files/frSubTheme2.txt');
										$tab2=explode(':::',$str);
									?>
									<header>
										<h3>&nbsp;&nbsp;Thème 2: </h3>
									</header>
									<div class="module_content">
										<fieldset>
											<label for="nom2" style="width:150px;float:left;" >Nom du Thème : </label>
											<input type="text" name="nom2" value="<?php echo $tab2[0];?>" size="38">
											60 caractères max.
										</fieldset>
										<fieldset>
											<label for="texte2" style="width:150px;float:left;" >Description : </label>
											<textarea name="texte2" cols="70" rows="15" ><?php echo $tab2[1];?></textarea>
										</fieldset>
									</div>
								</article>
								
								<article class="module width_full">
									<?php
										$str=file_get_contents('../FrontOffice/files/frSubTheme3.txt');
										$tab3=explode(':::',$str);
									?>
									<header>
										<h3>&nbsp;&nbsp;Thème 3: </h3>
									</header>
									<div class="module_content">
										<fieldset>
											<label for="nom3" style="width:150px;float:left;" >Nom du Thème : </label>
											<input type="text" name="nom3" value="<?php echo $tab3[0];?>" size="38">
											60 caractères max.
										</fieldset>
										<fieldset>
											<label for="texte3" style="width:150px;float:left;" >Description : </label>
											<textarea name="texte3" cols="70" rows="15" ><?php echo $tab3[1];?></textarea>
										</fieldset>
									</div>
								</article>
								
								<br />
								<div class="submit_link">
									<input type="submit" name="valider" value="Valider le formulaire français" class="alt_btn">
								</div>									
								<br /><br /><br />
							
							</form>
						</div>
						
						<!--Anglais-->
						<div id="tab2" class="tab_content" style="margin: 10px 20px;color: #666;">
						
							<form method="POST" action="control/toThemesAction.php?lang=en">
							
								<article class="module width_full">
									<header>
										<h3>&nbsp;&nbsp; Thème principal: </h3>
									</header>
									<div class="module_content">
										<fieldset>
											<label for="nom" style="width:150px;float:left;" >Nom du Thème : </label>
											<input type="text" name="nom" value="<?php echo $en_conf->getTheme(); ?>" size="38">
											60 caractères max.
										</fieldset>
										<fieldset>
											<label for="texte" style="width:150px;float:left;" >Description : </label>
											<textarea name="texte" cols="70" rows="15" ><?php readfile('../FrontOffice/files/enLeadingTheme.txt') ?></textarea>
										</fieldset>
									</div>
								</article>
								
								<article class="module width_full">
									<?php
										$str=file_get_contents('../FrontOffice/files/enSubTheme1.txt');
										$tab1=explode(':::',$str);
									?>
									<header>
										<h3>&nbsp;&nbsp; Thème 1: </h3>
									</header>
									<div class="module_content">
										<fieldset>
											<label for="nom1" style="width:150px;float:left;" >Nom du Thème : </label>
											<input type="text" name="nom1" value="<?php echo $tab1[0];?>" size="38">
											60 caractères max.
										</fieldset>
										<fieldset>
											<label for="texte1" style="width:150px;float:left;" >Description : </label>
											<textarea name="texte1" cols="70" rows="15" ><?php echo $tab1[1];?></textarea>
										</fieldset>
									</div>
								</article>
								
								<article class="module width_full">
									<?php
										$str=file_get_contents('../FrontOffice/files/enSubTheme2.txt');
										$tab2=explode(':::',$str);
									?>
									<header>
										<h3>&nbsp;&nbsp;Thème 2: </h3>
									</header>
									<div class="module_content">
										<fieldset>
											<label for="nom2" style="width:150px;float:left;" >Nom du Thème : </label>
											<input type="text" name="nom2" value="<?php echo $tab2[0];?>" size="38">
											60 caractères max.
										</fieldset>
										<fieldset>
											<label for="texte2" style="width:150px;float:left;" >Description : </label>
											<textarea name="texte2" cols="70" rows="15" ><?php echo $tab2[1];?></textarea>
										</fieldset>
									</div>
								</article>
								
								<article class="module width_full">
									<?php
										$str=file_get_contents('../FrontOffice/files/enSubTheme3.txt');
										$tab3=explode(':::',$str);
									?>
									<header>
										<h3>&nbsp;&nbsp;Thème 3: </h3>
									</header>
									<div class="module_content">
										<fieldset>
											<label for="nom3" style="width:150px;float:left;" >Nom du Thème : </label>
											<input type="text" name="nom3" value="<?php echo $tab3[0];?>" size="38">
											60 caractères max.
										</fieldset>
										<fieldset>
											<label for="texte3" style="width:150px;float:left;" >Description : </label>
											<textarea name="texte3" cols="70" rows="15" ><?php echo $tab3[1];?></textarea>
										</fieldset>
									</div>
								</article>
								
								<br />
								<div class="submit_link">
									<input type="submit" name="valider" value="Valider le formulaire anglais" class="alt_btn">
								</div>									
								<br /><br /><br />
							
							</form>
							
						</div>
						
					</div>
				</article>
				
			<div class="spacer"></div>
			<br /><br /><br /><br />
		</section>


</body>

</html>