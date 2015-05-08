<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<title>Groupe AiZo Conférence</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Site genere par Groupe AiZo Conference" />
<meta name="keywords" content="callForPaper, conference, Groupe AiZO Conference" />
<meta name="author" content="ELAMRANI ABOU ELASSAD Zouhair" />
<meta name="author" content="KARKOUCH Aimad" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/jcarousellite.js" type="text/javascript"></script>
<script type="text/javascript">
	
	//Utilisation du plugin de jquery
	$(document).ready(function(){
	  $("a.new_window").attr("target", "_blank");
	  
	  //carousel
	  $(".carousel").jCarouselLite({
		  btnNext: ".next",
		  btnPrev: ".prev"
	  });
	});
		
</script>
</head>

<body id="page1">
<div class="tail-top-left"></div>

<div class="tail-top">
	
	<!-- header -->
	<?php
		require('internationalization/setI18n.php');
		include('showHeader.php');
	?>
	
	<!-- content -->
	
	<div id="content">
		<div class="row-1">
			<div class="inside">
				<div class="container">
					
					<?php include('showMenu.php') ?>
					
					<!--Contenu-->
					<div class="content" style="margin:auto;">
						<h3>Formulaire de création de compte auteur</h3>
						
						<?php
						if(isset($_SESSION['erreur'])&&($_SESSION['erreur']=='oui')){
							$_SESSION['erreur']='non';
							if(isset($_SESSION['message'])){
								echo '<h5 style="color:red">Erreur : '.$_SESSION['message'].'</h5>';
								$_SESSION['message']='';
							}
						}
						?>
						<form method="post" action="control/authorAccountAction.php">
							<fieldset>
							<div class="field">
								<label>Nom (*): </label>
								<input type="text" name="nom" value=""/>
							</div>
							<div class="field">
								<label>Prénom (*): </label>
								<input type="text" name="prenom" value=""/>
							</div>
							<div class="field">
								<label>Adresse émail (*): </label>
								<input type="text" name="email" value=""/>
							</div>
							<div class="field">
								<label>Adresse (*): </label>
								<input type="text" name="adresse" value=""/>
							</div>
							<div class="field">
								<label>Mot de passe (*): </label>
								<input type="password" name="pass" value=""/>
							</div>
							<div class="field">
								<label>Confirmation du mot passe (*): </label>
								<input type="password" name="confirm" value=""/>
							</div>
							<div class="field">
								<label>Numéro de télephone : </label>
								<input type="text" name="tel" value=""/>
							</div>
							<div class="field">
								<label>Pays : </label>
								<input type="text" name="pays" value=""/>
							</div>
							<div class="field">
								<label>Nationalité : </label>
								<input type="text" name="nationalite" value=""/>
							</div>
							<div class="field">
								<label>Institution : </label>
								<input type="text" name="institution" value=""/>
							</div>
							<div class="field">
								<label>Laboratoire : </label>
								<input type="text" name="lab" value=""/>
							</div>
							<div class="field">
								<label>Equipe de travail : </label>
								<input type="text" name="equipe" value=""/>
							</div>
							<br />
							<div class="submit_link">
								<input type="submit" name="valider" value="Créer un compte" class="alt_btn">
							</div>	
							</fieldset>
						</form>
						<br />
						
						<div class="img-box1">
							<b class="txt2">(*) : Champs obligatoires</b>
						</div>
						
					</div>
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
		
		<!--Informations-->
		<?php include('showContact.php'); ?>
		
		
	</div>
	
	<!-- footer -->
<br/><br/>
	<div id="footer">
		<div class="footer">Copyright - Groupe AiZo Conference<br />
			Site géneré par : <a href="#" class="new_window">Groupe AiZo Conference</a>  ....  One Way , The Conference Way .<br />
		</div>
	</div>
	
</div>
</body>
</html>