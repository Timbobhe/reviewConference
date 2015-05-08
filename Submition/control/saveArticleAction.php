<?php require('../ToSignUpPage.php');

include_once("../../model/loadClassInstance.php");

$infosfichier;
$idsoum;
$_SESSION['erreur_nvArticle']="non";

if(empty($_POST['titre'])){
		$_SESSION['erreur_nvArticle']="oui";
		$_SESSION['message_nvArticle']="Champ Titre est obligatoire";
}
if(empty($_POST['langueArticle'])){
		$_SESSION['erreur_nvArticle']="oui";
		$_SESSION['message_nvArticle']="Champ Langue Article est obligatoire";
}
if(empty($_POST['themePrincipal'])){
		$_SESSION['erreur_nvArticle']="oui";
		$_SESSION['message_nvArticle']="Champ Theme Principal est obligatoire";
}

if(empty($_POST['languePresentation'])){
		$_SESSION['erreur_nvArticle']="oui";
		$_SESSION['message_nvArticle']="Champ Langue Presentation est obligatoire";
}
if(empty($_POST['typeParticipation'])){
		$_SESSION['erreur_nvArticle']="oui";
		$_SESSION['message_nvArticle']="Champ Type Participation est obligatoire";
}
if(empty($_POST['listMotClefs'])){
		$_SESSION['erreur_nvArticle']="oui";
		$_SESSION['message_nvArticle']="Champ list Mot Clefs est obligatoire";
}
if(empty($_POST['resume'])){
		$_SESSION['erreur_nvArticle']="oui";
		$_SESSION['message_nvArticle']="Champ Resume est obligatoire";
}
if(empty($_POST['format'])){
		$_SESSION['erreur_nvArticle']="oui";
		$_SESSION['message_nvArticle']="Champ Format est obligatoire";
}



if (isset($_FILES['article']) AND $_FILES['article']['error']== 0)
{
 	                
	$infosfichier = pathinfo($_FILES['article']['name']);
	$extension_upload = $infosfichier['extension'];
	$extensions_autorisees = array($_POST['format']);
	//verifie l'extension du fichier 
	
	if (!in_array($extension_upload, $extensions_autorisees)){
		$_SESSION['erreur_nvArticle']="oui";
		$_SESSION['message_nvArticle']="Format du fichier saisie est different du format de fichier joint";
		
	}
	
	move_uploaded_file($_FILES['article']['tmp_name'], '../uploads/' .$infosfichier['filename']);
	
}
else{
	$_SESSION['erreur_nvArticle']="oui";
	$_SESSION['message_nvArticle']="Chemin de fichier n'est pas saisie";
}


if ($_SESSION['erreur_nvArticle']=="oui") header("location:../newArticle.php");
if($_SESSION['erreur_nvArticle']=="non"){
$donnees = array('id'=>$_POST['idarticle'],'titre'=>$_POST['titre'],'langueArticle'=>$_POST['langueArticle'],'themePrincipal'=>$_POST['themePrincipal'],
'themesecondaire'=>$_POST['themesecondaire'],'languePresentation'=>$_POST['languePresentation'],'typeParticipation'=>$_POST['typeParticipation'],
'listMotClefs'=>$_POST['listMotClefs'],'resume'=>$_POST['resume'],'format'=>$_POST['format'],'url'=>$infosfichier['filename']);

$article = new Article($donnees);


	ArticleDao::add($article);
	$idarticle = ArticleDao::getLastId();
	$donne=array('idArticle'=>$idarticle['max(id)'],'idAuteur'=>$_SESSION['idAuteur'],'statut'=>1);	
	$soum = new Soumission($donne);
	SoumissionDao::add($soum);
	$idsoum = SoumissionDao::getLastId();
	


if($_POST['nbrAuteurS']==0 )header("location:../submitArticle.php");

else	
	
       header("location:../index.php");
}
?>