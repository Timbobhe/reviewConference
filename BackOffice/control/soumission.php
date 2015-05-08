<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');
function existenceDoublons($tableau) 
{
    $doublons = false; // valeur pas défaut
    $freq = array_count_values($tableau); 
// frequence de chaque valeur du $tableau
    
    foreach ($freq as $valeur)
    {
        if ($valeur != 1)
        {
            $doublons = true;
            break; // on sort de la boucle
        }
    }
    return $doublons;
}
$idarticle=$_POST['idarticle'];
$membre1=$_POST['membre1'];
$membre2=$_POST['membre2'];
$membre3=$_POST['membre3'];
if(empty($idarticle) || empty($membre1) || empty($membre2) || empty($membre3))
{
$_SESSION['erreur']='oui';
$_SESSION['message']='Informations incorrectes';	
header('Location:../generalSubmission.php');
exit();
}
$existe=((MembreComiteDao::getByid($membre1))&&(MembreComiteDao::getByid($membre2))&&(MembreComiteDao::getByid($membre3)))?true:false;
if(!$existe)
{
$_SESSION['erreur']='oui';
$_SESSION['message']='Le membre que vous avez inserer n\'existe pas';	
header('Location:../generalSubmission.php');
exit();
}
$membres=array($membre1,$membre2,$membre3);
if(existenceDoublons($membres))
{
$_SESSION['erreur']='oui';
$_SESSION['message']='Vous devez choisir des membres differents';	
header('Location:../generalSubmission.php');
exit();
}

foreach ($membres as $membre)
{
$revision=new Revision(array('idArticle'=>$idarticle,'idMembreComite'=>$membre,'terminee'=>3));	
RevisionDao::add($revision);
//envoyer le mail	
}
if(SoumissionDao::updateStatus(2,$idarticle))
{
$_SESSION['saved']='oui';
header('Location:../generalSubmission.php');		
exit();
}		
else 
{
$_SESSION['erreur']='oui';
$_SESSION['message']='Affectation';	
header('Location:../generalSubmission.php');
}

?>
