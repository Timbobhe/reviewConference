<?php
session_start();
include_once(dirname (__FILE__).'/../loadClassInstance.php');
$PA=$_POST['PA'];
$PM=$_POST['PM'];
$PV=$_POST['PV'];
if(empty($PA) || empty($PM)|| empty($PV))
{
	$_SESSION['erreur']='oui';
	$_SESSION['message']='Initialisation prix conference';
	header('Location:../generalInscription.php');
}
else
{
AdminUtilitis::savePrixConference(array('PA'=>$PA,'PM'=>$PM,'PV'=>$PV));
$_SESSION['saved']='oui';
header('Location:../generalInscription.php');		
}  
?>