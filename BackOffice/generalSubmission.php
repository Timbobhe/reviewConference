<?php require('showSignIn.php'); 
include_once(dirname (__FILE__).'/loadClassInstance.php'); 
?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Admin : Soumissions</title>
	
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
	
	<?php 
	
	?>
	
	<section id="main" class="column">
		
		<h4 class="alert_info">Administration des soumissions</h4>
		<?php 
		$soumission=SoumissionDao::getNotrevisedSoumission();
		if(sizeof($soumission)==0)
		{
		?>
			<h4 class="alert_success">Tous Les articles sont affectes</h4>
		<?php 
		}
		include_once 'controlerror.php';
		?>					
		<article class="module width_full">
		<form action="control/soumission.php" method="post" >
			<header><h3>Affectation des articles</h3></header>
				<div class="module_content">
				<h3>Details Article</h3>
						<fieldset style="width:40%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>ID article</label>
							<select style="width:92%;" name='idarticle'>
						     <?php 
						     foreach ($soumission as $article)
						     {   
						     ?>
						     <option  value="<?php echo $article->getIdArticle();?>"  onclick="return document.getElementById('themearticle').innerHTML='<?php echo $article->getThemePrincipal();?>'"><?php echo $article->getIdArticle();?></option>
						     <?php 
						     }
						     ?>
							 </select><br/><br/>
							
							<label>Theme Article</label>
							<b><p class="overview_day" style="width:92%" id="themearticle" ></p></b>
						</fieldset>
						  <div class="clear"></div>
				</div>
				<div class="module_content">
						<h3 style="margin-top:5%">Membre Commite</h3>
						<?php 
						$membres=MembreComiteDao::filtre();
						?>
							<fieldset style="width:40%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Membre 1</label>
							<select style="width:92%;" name="membre1" >
							<option>---------------</option>
							<?php
							$groupe=''; 
							foreach ($membres as $membre)
							{
								if($membre->getTheme()!=$groupe)
								{
									if($groupe!='')
                                    echo '</optgroup>';
									$groupe=$membre->getTheme();
							?>
                                    <optgroup label="<?php echo $groupe ;?>">
                            <?php 
								}
							?>
							<option value="<?php echo $membre->getId();?>"  ><?php echo $membre->getNom().' '.$membre->getPrenom();?>
							<?php
							}
							?>	
							</select>
						</fieldset>
							<fieldset style="width:40%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Membre 2</label>
							<select style="width:92%;" name="membre2"  >
							<option>---------------</option>
	                         	<?php
							$groupe=''; 
							foreach ($membres as $membre)
							{
								if($membre->getTheme()!=$groupe)
								{
									if($groupe!='')
                                    echo '</optgroup>';
									$groupe=$membre->getTheme();
							?>
                                    <optgroup label="<?php echo $groupe ;?>">
                            <?php 
								}
							?>
							<option value="<?php echo $membre->getId();?>"><?php echo $membre->getNom().' '.$membre->getPrenom();?>
							<?php
							}
							?>	
							</select>
						</fieldset>
							<fieldset style="width:40%; margin-right: 3%;"> <!-- to make two field float next to one another, adjust values accordingly -->
							<label>Membre 3</label>
							<select style="width:92%;" name="membre3"  >
							<option>---------------</option>
					         	<?php
							$groupe=''; 
							foreach ($membres as $membre)
							{
								if($membre->getTheme()!=$groupe)
								{
									if($groupe!='')
                                    echo '</optgroup>';
									$groupe=$membre->getTheme();
							?>
                                    <optgroup label="<?php echo $groupe ;?>">
                            <?php 
								}
							?>
							<option value="<?php echo $membre->getId();?>" ><?php echo $membre->getNom().' '.$membre->getPrenom();?>
							<?php
							}
							?>	
							</select>
						</fieldset>
						  <div class="clear"></div>

				</div>	
		        
			<footer>
				<div class="submit_link">
					<input type="submit" value="Affecter" class="alt_btn">
				</div>
			</footer>
			</form>
		</article><!-- end of post new article -->
		
		<div class="spacer"></div>
	</section>


</body>

</html>