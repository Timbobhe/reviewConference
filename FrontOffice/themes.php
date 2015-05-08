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
						<h3><?php echo DESC_THEME;?></h3>
						<fieldset style="border:2px solid 	#008B8B;border-radius:8px;">
						<legend><b style="color:#6A5ACD; font-size:20px;  "> <?php echo THEMEPRINCIPAL; ?> </b></legend>
						<div class="img-box1">
							<b class="txt2"><span style="text-decoration:underline;margin-left:20px;"><?php echo $conf->getTheme(); ?></span></b>
						</div>

						<li class="txt6">
							<?php
								$overview=file_get_contents('files/'.$_SESSION['lang'].'LeadingTheme.txt');
								echo nl2br($overview);
							?>
							</li><br/>
									
						</fieldset><br/><br/>
						<!--Thème 1-->
						<fieldset style="border:2px solid 	#008B8B;border-radius:8px;">
						<legend><b style="color:#6A5ACD; font-size:20px;  "> <?php echo THEMESECONDAIRE; ?></b></legend>
						<?php
							$str1=file_get_contents('files/'.$_SESSION['lang'].'SubTheme1.txt');
							$tab1=explode(':::',$str1);
							if(isset($tab1[1])){
						?>
						
						<div class="img-box1">
							<b class="txt2"><span style="text-decoration:underline;margin-left:20px;"> <?php echo $tab1[0];?></span></b>
						</div>
						<li class="txt6"><?php echo nl2br($tab1[1]);?></li>
						<?php }?>
						
						<!--Thème 2-->
						<?php
							$str2=file_get_contents('files/'.$_SESSION['lang'].'SubTheme2.txt');
							$tab2=explode(':::',$str2);
							if(isset($tab2[1])){
						?>
						<div class="img-box1">
							<b class="txt2"><span style="text-decoration:underline;margin-left:20px;"><?php echo $tab2[0];?></span></b>
						</div>
						<li class="txt6"><?php echo nl2br($tab2[1]);?></li></br>
						<?php }?>
						</fieldset><br/><br/>				
						<!--Thème 3-->
						<fieldset style="border:2px solid 	#008B8B;border-radius:8px;">
						<legend><b style="color:#6A5ACD; font-size:20px;  "> <?php echo THEMESECONDAIRE; ?></b></legend>
						<?php
							$str3=file_get_contents('files/'.$_SESSION['lang'].'SubTheme3.txt');
							$tab3=explode(':::',$str3);
							if(isset($tab3[1])){
						?>
						<div class="img-box1">
							<b class="txt2"><span style="text-decoration:underline;margin-left:20px;"><?php echo $tab3[0];?></span></b>
						</div>
						<li class="txt6"><?php echo nl2br($tab3[1]);?></li><br/>
						<?php }?>
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
		<div class="footer">Copyright - AiZo Groupe Conference<br />
			Site géneré par : <a href="#" class="new_window">AiZo Groupe Conference</a>  ....  One Way , The Conference Way .<br />
		</div>
	</div>
	
</div>
</body>
</html>