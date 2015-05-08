<?php
	session_start();
	
	//Si deja connecte
	if(isset($_SESSION["connecte"])){
		if($_SESSION["connecte"]=="oui"){
			header("location:index.php");
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
				@$fichier=fopen('config/admin_config.txt','r');
				if($fichier){
					$tab=explode(':',fgets($fichier));
					fclose($fichier);
					if(($login==$tab[0]) && (md5($pass)==$tab[1])){	
						$_SESSION["connecte"]="oui";
						header("location:index.php");
					}
				}
			}
		}
		$erreur=true;
	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
			<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />

	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php require('include_js.php'); ?>

</head>


<body>

	<!--Header-->
	<?php include('showHeader.php')?>
	
	<div style="margin:auto;width:500px;height:400px">
		
		<form method="POST" action="signIn.php">
			<div id="login-holder">

	
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
	<h3 style="font-size:18px;color:white; text-shadow:#000000 1px 1px,#000000 -1px 1px,#000000 -1px -1px,#000000 1px -1px; width:500px">Connexion au compte Administrateur : </h3>
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Login</th>
			<td><input type="text"  class="login-inp" name="login"/></td>
		</tr>
		<tr>
			<th>Mot De Pass</th>
			<td><input type="password" value="************"  onfocus="this.value=''" class="login-inp" name="pass"/></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" value="Connexion" name="valider"/></td>
		</tr>
		</table>
	</div>

	<center>
	<br/>
	<p style="font-size:18px;color:red; text-shadow:#000000 1px 1px,#000000 -1px 1px,#000000 -1px -1px,#000000 1px -1px;">
						<?php
							if($erreur==true){
								echo "Login ou mot de passe incorrecte!";
								$erreur=false;
							}
						?>
					</p></center>
</div>
		</form>
			
			
		<div class="clear"></div>
		<div class="spacer"></div>
		
	</div>


</body>

</html>