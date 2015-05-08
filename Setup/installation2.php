<?php 
session_start();
$login=$_POST['login'];
$pass=$_POST['pass'];
$confirm_pass=$_POST['confirm_pass'];
if(empty($login) || empty($pass)|| empty($confirm_pass))
{
	$_SESSION['erreur']='oui';
    $_SESSION['message']='Informations incorrectes';
	header('Location:installation1.php');
    exit();
}
elseif ($pass!=$confirm_pass)
{
	$_SESSION['erreur']='oui';
    $_SESSION['message']='mot de passe non identique';
	header('Location:installation1.php');
	exit();
} 
$_SESSION['login']=$login;
$_SESSION['pass']=$pass;
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
			
			<h4 class="alert_info">Installation: Step 2</h4>
	           <?php include_once '../BackOffice/controlerror.php';   ?>
				<div style="margin:auto;width:500px;height:400px">
					<form method="post" action="installation3.php">
						<fieldset style="border:2px solid 	#008B8B;border-radius:8px;margin-left:50px;">
					<legend><b style="color:#6A5ACD; font-size:24px;  ">Configuration Database</b></legend>
							<div class="module_content">
							<p>
							Aizo Group needs access to database to save and load data all the way during information travel process ,
							Aizo Group allows you to manually configure personal informations in order to guarantee a fonctional use 
							of the website.
						
							<div id="step-holder">
							<div class="step-no">2</div>
							<div class="step-dark-left">Configuration</div>
							<div class="clear"></div>
							</div>
							</p>
							
								<p>
									<label for="host" style="width:200px;float:left;" >Host</label>
									<input type="text" name="host">
								</p><br/>
								<p>
									<label for="username" style="width:200px;float:left;" >Username</label>
									<input type="text" name="username">
								</p><br/>
								<p>
									<label for="pass" style="width:200px;float:left;" >Password</label>
									<input type="password" name="passbdd">
								</p><br/>
								<p>
									<label for="nombdd" style="width:200px;float:left;" >Database Name</label>
									<input type="text" name="nombdd">
								</p>
							</div>
							<footer>
								<div class="submit_link">
									<input type="submit" name="change_login" value="Next" class="alt_btn">
								</div>
							</footer>
						</fieldset><!-- end of post new article -->
					</form>

				</div>
				

			<div class="spacer"></div>
		</section>


</body>

</html>