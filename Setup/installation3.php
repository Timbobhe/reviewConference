<?php
session_start();
$host=$_POST['host'];
$username=$_POST['username'];
$passbdd=$_POST['passbdd'];
$nombdd=$_POST['nombdd'];
if(empty($host) || empty($username) || empty($nombdd))
{
	$_SESSION['erreur']='oui';
    $_SESSION['message']='Informations incorrectes';
	header('Location:installation2.php');
	exit();
}
$_SESSION['host']=$host;
$_SESSION['username']=$username;
$_SESSION['passbdd']=$passbdd;
$_SESSION['nombdd']='cfp';
?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Installation AiZo Groupe Conference</title>
			<link rel="stylesheet" href="css/datePicker.css" type="text/css" /><html lang="fr">
	<link rel="stylesheet" href="css/screen.css" type="text/css" /><html lang="fr">
	<link rel="stylesheet" href="../BackOffice/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php require('../BackOffice/include_js.php'); ?>

</head>


<body>

  <header id="header">
	<hgroup>
		<h1 class="site_title"><a href="index.php">AiZo Groupe Installation</a></h1>
		<h2 class="section_title">Bienvenue dans AiZo Groupe Conference</h2>
	</hgroup>
   </header> <!-- end of header bar -->
	
		<section id="main" class="column">
			
			<h4 class="alert_info">Installation: Step 3</h4>
	
				<div style="margin:auto;width:500px;height:400px"><br/><br/>
					<form method="post" action="install.php">
					<fieldset style="border:2px solid 	#008B8B;border-radius:8px;margin-left:50px;">
					<legend><b style="color:#6A5ACD; font-size:24px;  ">Validation</b></legend>				
								
							<div id="step-holder">
							<div class="step-no">3</div>
							<div class="step-dark-left">One Step To Go</div>
							<div class="clear"></div>	
							<div class="module_content">
							<p>A confirmation is needed , please confirme your choice :
							</div>
							<footer>
				            <input type="radio" name='accepte' value="1" /><b>Accepte</b>
							<input type="radio" name='accepte' value="0" /><b>Refuse</b>
					        <div class="submit_link">
							<input type="submit" name="change_login" value="Done" class="alt_btn">
							</div>
							</footer>
						</fieldset>
					</form>

				</div>
				

			<div class="spacer"></div>
		</section>


</body>

</html>