<?php
	session_start();
	if(!isset($_SESSION['etape1'])){
		header("location:ordinaryInscriptionStep1.php");
	}
	include_once(dirname (__FILE__).'/loadClassInstance.php');
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
	
	function loadHotel(adresse)
    {
    	
    	  var list = document.getElementById('listhotel');
    	  document.getElementById('nomhotel').value=list.options[list.selectedIndex].innerHTML;
    	  document.getElementById('adressehotel').value=list.options[list.selectedIndex].value;
    	
    }
		
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
					<div class="content">
						
						<h3>Formulaire d'inscription à la conférence</h3>
						<div class="img-box1">
							<b class="txt2">Inscription normale : Etape 2</b>
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
						<form method="post" action="control/ordinaryInscriptionStep2Action.php">
						<fieldset style="border:2px solid 	#008B8B;border-radius:8px;">
							<div class="field">
								<label>Date d'arrivée (* yyyy-mm-jj): </label>
								<input type="text" name="date1" value=""/> 
							</div>
							<div class="field">
								<label>Date de retour (* yyyy-mm-jj): </label>
								<input type="text" name="date2" value=""/> 
							</div>
							
							
							
							
							
							<div class="submit_link">
								<input type="submit" name="valider" value="Terminer l'inscription" class="alt_btn">
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
		<!--Gallery-->
		<center><hr style="width:800px;color:#87CEEB "/></center>
		<?php include('showInfos.php'); ?>
		<br/>
		<center><hr style="width:800px;color:#87CEEB "/></center>
		
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