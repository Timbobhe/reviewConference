<?php require('../ToSignUpPage.php');

include_once("../../model/loadClassInstance.php");

$infosfichier;
$idsoum = $_POST['idsoum'];
$_SESSION['idSoum']=$idsoum;

$_SESSION['erreur']="non";
if (isset($_FILES['article']) AND $_FILES['article']['error']== 0)
{
 	                
	$infosfichier = pathinfo($_FILES['article']['name']);
	$extension_upload = $infosfichier['extension'];
	$extensions_autorisees = array($_POST['format']);
	
	
	if (!in_array($extension_upload, $extensions_autorisees)){
		$_SESSION['erreur']="oui";
		header("location:../newArticle.php");
	}
	
	move_uploaded_file($_FILES['article']['tmp_name'], '../uploads/' .$infosfichier['filename']);
	
}

if($_SESSION['erreur']=="non"){
$donnees = array('id'=>$_POST['idarticle'],'titre'=>$_POST['titre'],'langueArticle'=>$_POST['langueArticle'],'themePrincipal'=>$_POST['themePrincipal'],
'themesecondaire'=>$_POST['themesecondaire'],'languePresentation'=>$_POST['languePresentation'],'typeParticipation'=>$_POST['typeParticipation'],
'listMotClefs'=>$_POST['listMotClefs'],'resume'=>$_POST['resume'],'format'=>$_POST['format'],'url'=>$infosfichier['filename']);

$article = new Article($donnees);


ArticleDao::update($article);


if($_SESSION['erreur']="non")	
header("location:../editSecondAuthor.php");

}
?>