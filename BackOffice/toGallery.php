<?php
	require('showSignIn.php');
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
			
			<h4 class="alert_info">Gallerie des photos</h4>
			
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
				
				
			<div class="spacer"></div>
			<br /><br /><br /><br />
		</section>


</body>

</html>