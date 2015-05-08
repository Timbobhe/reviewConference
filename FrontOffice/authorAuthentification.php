<?php
	session_start();
	
	include_once("loadClassInstance.php");
	
	//Si deja connecte
	if(isset($_SESSION["connecte_auteur"])){
		if($_SESSION["connecte_auteur"]=="oui"){
			header("location:authorInscriptionStep1.php");
		}
	}
	
	//Si non connecte
	@$login=$_POST["login"];
	@$pass=$_POST["pass"];
	@$valider=$_POST["valider"];
	$erreur=false;
	
	if(isset($valider)){
		if(isset($login)&&(!empty($login))){
			if(isset($pass)&&(!empty($pass))){
				
				$auteur = AuteurPrincipalDao::isInscrit($login,md5($pass));
					if($auteur!=null)
					if(($login==$auteur->getEmail()) && (md5($pass)==$auteur->getPswd())){	
						$_SESSION["connecte_auteur"]="oui";
						$_SESSION["auteur"]=serialize($auteur);
						header("location:authorInscriptionStep1.php");
						exit();
					}
				
			}
		}
		
		$erreur=true;
	}
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
					<div class="content">
						<form method="post" action="authorAuthentification.php">
							<article class="module width_full">
								<header>
									<h3>&nbsp;&nbsp;Connexion au compte Auteur : </h3>
								</header>
								<div class="module_content">
						<fieldset style="border:2px solid 	#008B8B;border-radius:8px;">
									<p>
										<label for="login" style="width:130px;float:left;" >Login : </label>
										<input type="text" name="login">
									</p>
									<p>
										<label for="pass" style="width:130px;float:left;" >Mot de passe : </label>
										<input type="password" name="pass">
									</p>
									<p style="color:red;">
										<?php
											if($erreur==true){
												echo "Login ou mot de passe incorrecte!";
												$erreur=false;
											}
										?>
									</p><div style="height:5px;"></div>
									</fieldset>
								</div>
								<footer>
									<div class="submit_link">
										<input type="submit" name="valider" value="Connexion" class="alt_btn">
									</div>
								</footer>
							</article><!-- end of post new article -->
						</form>
						
						<br /><br />
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