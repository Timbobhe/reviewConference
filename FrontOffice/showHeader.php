	<?php
		include_once("../BackOffice/model/Conference.class.php");
		include_once("../BackOffice/model/ConferenceAdmin.class.php");
		$conf=ConferenceAdmin::getConferenceSite($_SESSION['lang']);
	?>
	<div id="header">
		<div class="row-1">
			<div class="fleft">
				<a href="?lang=fr"><img src="images/fr.gif" alt="" /></a>
				<a href="?lang=en"><img src="images/en.gif" alt="" /></a>
			</div>
			<center>
			<div class="menuholder">
			<ul class="menu slide">
            <li><a href="index.php" class="active red"><?php echo HOME; ?> </a></li>
            <li><a href="themes.php"class="red"><?php echo THEME ?> </a></li>
            <li><a href="callForPaper.php" class="red"><?php echo callForPaper; ?></a></li>
            <li><a href="programme.php" class="red"><?php echo PROGRAM; ?></a></li>
            <li><a href="soumission.php" class="red"><?php echo SUBMIT; ?></a></li>
            <li><a href="revision.php" class="red"><?php echo COMITE; ?></a></li>
			<li><a href="inscription.php" class="red"><?php echo SIGNUP; ?></a></li>
			<li><a href="contact.php" class="red"><?php echo CONTACT; ?></a></li>
			</ul>
			<div class="shadow"></div>
		</div>
		</center>
		</div>
		<div class="row-2">
			<div>
				<!--A remplacer à partir de la base de données -->
				<b><?php echo $conf->getNom(); ?></b><br/><br/>
				<br/><br/><br/><span><?php echo $conf->getDescription(); ?></span>
			</div>
		</div>
	</div>