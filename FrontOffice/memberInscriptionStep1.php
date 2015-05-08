<?php
session_start();
include_once("loadClassInstance.php");

	if(!isset($_SESSION["connecte_membre"])){
		header("location:memberAuthentification.php");
	}

$membre=unserialize($_SESSION["mbrComite"]);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<title>AiZo Groupe Conférence</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Site genere par AiZo Groupe Conference" />
<meta name="keywords" content="conference, callForPaper, submission" />
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
						<h3>Formulaire d'inscription pour participation</h3>
						
						<div class="img-box1">
							<b class="txt2">Inscription Membre du comité scientifique : Etape 1</b>
						</div>	
						
						<div class="img-box1">
							<b class="txt2">Bonjour <?php echo $membre->getNom();?> <?php echo $membre->getPrenom();?></b>
						</div>	
						
						<?php
						if(isset($_SESSION['erreur'])&&($_SESSION['erreur']=='oui')){
							$_SESSION['erreur']='non';
							if(isset($_SESSION['message'])){
								echo '<h5 style="color:red">Erreur : '.$_SESSION['message'].'</h5>';
								$_SESSION['message']='';
							}
						}
						?>
						
						<form method="post" action="control/memberInscriptionStep1Action.php">
						<fieldset style="border:2px solid 	#008B8B;border-radius:8px;">
							<div class="field">
								<label>Numéro de passeport (*): </label>
								<input type="text" name="passeport" value=""/>
							</div>
							<div class="submit_link">
								<input type="submit" name="valider" value="Confirmer mon inscription" class="alt_btn">
							</div>	
							</fieldset>
						</form>
						
						
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
		<div class="footer">Copyright - AiZo Groupe Conference<br />
			Site géneré par : <a href="#" class="new_window">AiZo Groupe Conference</a>  ....  One Way , The Conference Way .<br />
		</div>
	</div>
	
</div>
</body>
</html>