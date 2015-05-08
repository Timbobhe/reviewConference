<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');
$idarticle=$_GET['id'];
$existe=ArticleDao::get($idarticle);
if(!isset($idarticle) || $existe==false)
{
	$_SESSION['erreur']='oui';
    $_SESSION['message']='Suppression Article';	
	header('Location:../articleDetails.php');
}
else
{
$article=new Article(array('id'=>$idarticle));	
ArticleDao::delete($article);
$_SESSION['saved']='oui';
header('Location:../articleDetails.php');		
}  
?>