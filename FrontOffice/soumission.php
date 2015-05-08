﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
						<h3><?php echo DESC_SUBMIT;?></h3>
						<fieldset style="border:2px solid 	#008B8B;border-radius:8px;">
						<legend><b style="color:#6A5ACD; font-size:22px;  "><?php echo SUBMITCOND;?></b></legend><br/>
						
						<li class="txt6">
							<?php
								$overview=file_get_contents('files/'.$_SESSION['lang'].'SubmissionDetails.txt');
								echo nl2br($overview);
							?>
						</li><br/>
						</fieldset><br/><br/>
						<fieldset style="border:2px solid 	#008B8B;border-radius:8px;">
						<legend><b style="color:#6A5ACD; font-size:22px;  "><?php echo SUBNOTICE;?></b></legend><br/>
						<div class="wrapper2">
							<a href="../Submition/signUp.php" class="link1"><em><b><?php echo AUTHORBT;?></b></em></a>
						</div>
						<br /><br />
						<div class="wrapper2">
							<a href="authorAccountSub.php" class="link1"><em><b><?php echo COMPTEBT;?></b></em></a>
						</div><br/>
						</fieldset>
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
		<div class="footer">Copyright - Groupe AiZo Conference<br />
			Site géneré par : <a href="#" class="new_window">Groupe AiZo Conference</a>  ....  One Way , The Conference Way .<br />
		</div>
	</div>
	
</div>
</body>
</html>