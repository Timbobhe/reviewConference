<?php
	session_start();
	
	include_once("../model/loadClassInstance.php");
	
	//Si deja connecte
	if(isset($_SESSION["connecte_auteur"])){
		if($_SESSION["connecte_auteur"]=="oui"){
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
				
				$auteur = AuteurPrincipalDao::isInscrit($login, md5($pass));
					if($auteur!=null)
					if(($login==$auteur->getEmail()) && (md5($pass)==$auteur->getPswd())){	
						$_SESSION["connecte_auteur"]="oui";
						$_SESSION["auteur"]=serialize($auteur);
						header("location:index.php");
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
	<title>Administration</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />

	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	

</head>


<body>

	<!--Header-->
	<?php include('Header.php')?>
	
	<div style="margin:auto;width:500px;height:400px">
		
		<form method="POST" action="signUp.php">

				
	<br/><br/>
				<div id="login-holder">

	
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
	<h3 style="font-size:18px;color:white; text-shadow:#000000 1px 1px,#000000 -1px 1px,#000000 -1px -1px,#000000 1px -1px; ">&nbsp;&nbsp;Connexion au compte Auteur : </h3>
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
				
		
			
		
		
	</div>
</form>

</body>

</html>