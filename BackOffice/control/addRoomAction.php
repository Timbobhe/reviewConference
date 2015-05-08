<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');
$idhotel=$_POST['hotel'];
$prix=$_POST['prixchambre'];
$numchambre=$_POST['numchambre'];
$existe=HotelDao::existe($idhotel);
if(empty($idhotel) || empty($prix) || empty($numchambre) || $existe==false)
{
$_SESSION['erreur']='oui';
$_SESSION['message']='Ajout chambre';	
header('Location:../generalInscription.php');
exit();
}
else
{
$chambre=new Chambre(array('idhotel'=>$idhotel,'prix'=>$prix,'etat'=>0,'numChambre'=>$numchambre));
ChambreDao::addChambre($chambre);
$_SESSION['saved']='oui';
header('Location:../generalInscription.php');		
exit();
}  
?>