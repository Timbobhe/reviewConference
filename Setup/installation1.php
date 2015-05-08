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
			
			<h4 class="alert_info">Installation: Step 1</h4>
			<?php include_once '../BackOffice/controlerror.php';   ?><br/><br/>
				<fieldset style="border:2px solid 	#008B8B;border-radius:8px;margin-left:50px;">
				<legend><b style="color:#6A5ACD; font-size:24px;  ">Presentation</b></legend>
				<div class="module_content">
				<p>AiZO Group is a group named after the two members ELAMRANI ABOU ELASSAD Zouhair and KARKOUCH Aimad , their job
				is to create a well functioning conference websites without neglecting attractive desgins , The AiZo Group allows you to :
				 <ul>
				 <li>Built you own conference website</li>
				 <li>Recieve papers from all potential users</li>
				 <li>Follow each and every paper life cercle</li>
				 <li>Conference statistics</li>
				 </ul>
				 </p>
				 </div></fieldset><br/><br/>
				<div style="margin:auto;width:500px;height:400px">
						<fieldset style="border:2px solid 	#008B8B;border-radius:8px;">
					<form method="post" action="installation2.php">
						<div id="step-holder">
						<div class="step-no">1</div>
						<div class="step-dark-left">Admin Configuration</div>
						<div class="clear"></div>
						</div>
						<div class="module_content">
						<table border="0" cellpadding="5" cellspacing="4"  id="id-form">
							
								<tr>
									<td><b>Login : </b></td>
									<td><input type="text" name="login"></td>
								</tr>
								<tr>
									<td><b>Mot de passe : </b></td>
									<td><input type="password" name="pass"></td>
								</tr>
								<tr>
									<td><b>Confirmation : </b></td>
									<td><input type="password" name="confirm_pass"></td>
								</tr>
							
							<tr><td></td>
							<td>
								<div class="submit_link">
									<input type="submit" name="change_login" value="Next" class="alt_btn">
								</div>
							</td>
						</table>
						</div>
					</form>
					</fieldset>

				</div>
				

			<div class="spacer"></div>
		</section>


</body>

</html>