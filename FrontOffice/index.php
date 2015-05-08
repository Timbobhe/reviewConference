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
					<div class="content">
						<h3 style="text-align : center;font-size:27px;"><?php echo PRESENTATION;?></h3>
						<div class="img-box1">
						<center style="margin-left:30px;"><img src="images/ensa.png" /></center>
						</div>
							<div class="img-box1">
							<b class="txt2"><?php echo $conf->getNom(); ?></b>
						</div>
						<p>
						<li class="txt5">
						<?php
							$overview=file_get_contents('files/'.$_SESSION['lang'].'Home.txt');
							echo nl2br($overview);
						?>
						</li>
						</p>
						<div class="wrapper">
							<a href="callForPaper.php" class="link1"><em><b><?php echo MORE;?></b></em></a>
						</div>
					</div>
					
					<div class="clear"></div>
				</div>
			</div>
		</div>
		
		
		<!--Gallery-->
		<center><hr style="width:800px;color:#87CEEB "/></center>
		<?php include('showInfos.php'); ?>
		<br/>
		<center><hr style="width:800px;color:#87CEEB "/></center>
		
	</div>
	<br/><br/>
	<!-- footer -->
	<div id="footer">
		<div class="footer">&copy; Copyright - Groupe AiZo Conference<br />
			Site géneré par : <a href="#" class="new_window">Groupe AiZo Conference</a>  ....  One Way , The Conference Way .<br />
		</div>
	</div>
	
</div>
</body>
</html>