<?php require('showSignIn.php'); ?>
<?php
	
	//Declarations 1
	@$login=$_POST["login"];
	@$pass=$_POST["pass"];
	@$change_login=$_POST["change_login"];
	$erreur1=false;//Mot de passe incorrecte
	$confirm1=false;
	
	//Declarations 2
	@$old_pass=$_POST["old_pass"];
	@$new_pass=$_POST["new_pass"];
	@$confirm_pass=$_POST["confirm_pass"];
	@$change_pass=$_POST["change_pass"];
	$erreur2=false;
	$erreur3=false;
	$confirm2=false;
	
	//Changement du login
	if(isset($change_login)){
		if(isset($login)&&(!empty($login))){
			if(isset($pass)&&(!empty($pass))){
				@$fichier=fopen('config/admin_config.txt','r');
				if($fichier){
					$tab=explode(':',fgets($fichier));
					fclose($fichier);
					if((md5($pass)==$tab[1])){	
						@$fichier=fopen('config/admin_config.txt','w');
						fputs($fichier,$login.":".md5($pass));
						$confirm1=true;
					}
					else{
						$erreur1=true;
					}
				}
			}
		}
	}
	
	//Changement du mot de passe
	if(isset($change_pass)){
		if(isset($old_pass)&&(!empty($old_pass))){
			if(isset($new_pass)&&(!empty($new_pass))){
				if($new_pass==$confirm_pass){
					@$fichier=fopen('config/admin_config.txt','r');
					if($fichier){
						$tab=explode(':',fgets($fichier));
						fclose($fichier);
						if((md5($old_pass)==$tab[1])){	
							@$fichier=fopen('config/admin_config.txt','w');
							fputs($fichier,$tab[0].":".md5($new_pass));
							$confirm2=true;
						}
						else{
							$erreur3=true;
						}
					}
				}
				else{
					$erreur2=true;
				}
			}
		}
	}
	
?>
<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8"/>
	<title>Admin : Utilisateurs</title>
	
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
			
			<h4 class="alert_info">Gestion du compte administrateur</h4>
				
				<div style="margin:auto;width:500px;height:400px">
					<form method="POST" action="AdminProfile.php">
						<article class="module width_full">
							<header>
								<h3>&nbsp;&nbsp;Changement du login: </h3>
							</header>
							<div class="module_content">
								<p>
									<label for="login" style="width:200px;float:left;" >Nouveau Login : </label>
									<input type="text" name="login">
								</p>
								<p>
									<label for="pass" style="width:200px;float:left;" >Mot de passe : </label>
									<input type="password" name="pass">
								</p>
								<p style="color:green;">
									<?php
										if($confirm1==true){
											echo "Login changé avec succès!";
											$confirm1=false;
										}
									?>
								</p>
								<p style="color:red;">
									<?php
										if($erreur1==true){
											echo "Mot de passe incorrecte!";
											$erreur1=false;
										}
									?>
								</p>
							</div>
							<footer>
								<div class="submit_link">
									<input type="submit" name="change_login" value="Changer login" class="alt_btn">
								</div>
							</footer>
						</article><!-- end of post new article -->
					</form>

					<form method="POST" action="AdminProfile.php">
						<article class="module width_full">
							<header>
								<h3>&nbsp;&nbsp;Changement du mot de passe: </h3>
							</header>
							<div class="module_content">
								<p>
									<label for="old_pass" style="width:200px;float:left;" >Ancien mot de passe : </label>
									<input type="password" name="old_pass" value="">
								</p>
								<p>
									<label for="new_pass" style="width:200px;float:left;" >Nouveau mot de passe : </label>
									<input type="password" name="new_pass">
								</p>
								<p>
									<label for="confirm_pass" style="width:200px;float:left;" >Confirmation : </label>
									<input type="password" name="confirm_pass">
								</p>
								<p style="color:green;">
									<?php
										if($confirm2==true){
											echo "Mot de passe changé avec succès!";
											$confirm2=false;
										}
									?>
								</p>
								<p style="color:red;">
									<?php
										if($erreur2==true){
											echo "La confirmation de correspond pas au nouveau mot de passe!";
											$erreur2=false;
										}
										if($erreur3==true){
											echo "Mot de passe incorrecte!";
											$erreur3=false;
										}
									?>
								</p>
							</div>
							<footer>
								<div class="submit_link">
									<input type="submit" name="change_pass" value="Changer mot de passe" class="alt_btn">
								</div>
							</footer>
						</article><!-- end of post new article -->
					</form>
				</div>
				

			<div class="spacer"></div>
		</section>


</body>

</html>