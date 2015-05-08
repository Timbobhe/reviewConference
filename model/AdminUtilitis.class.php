<?php

class AdminUtilitis{
	
public static function saveConference(Conference $conference)
{
	
	
	
	
	
	$file=fopen('conference','w');
    if($file==false)
    return false;
    fputs($file,$conference->getTheme().';');
    fputs($file,$conference->getDate().';');
    fputs($file,$conference->getLieu().';');
    fputs($file,$conference->getDatelimite().';');
    fputs($file,$conference->getTel().';');
    fputs($file,$conference->getFax().';');
    fputs($file,$conference->getPays().';');
    fputs($file,$conference->getCodepostale().';');
    fputs($file,$conference->getDescription());
    
    fclose($file);
    return true;
}

public static function getConference()
{
	$file=fopen('conference','r');
	if($file==false)
	return false;
	$ligne=fgets($file);
	$arrayconf=explode(';', $ligne);
	$donnees=array('theme'=>$arrayconf[0],'date'=>$arrayconf[1],'lieu'=>$arrayconf[2],'datelimite'=>$arrayconf[3],'tel'=>$arrayconf[4],'fax'=>$arrayconf[5],'pays'=>$arrayconf[6],'codepostale'=>$arrayconf[7],'description'=>$arrayconf[8]);                                          
	$conference=new Conference($donnees);
	fclose($file);
	return $conference;
}

public static function dropConference(){
	unlink('conference');
}

public static function savePrixConference($donnees)
{
	
	$file=fopen('../config/files/conferencePrice.txt','w');
    if($file==false)
    return false;
    fputs($file,$donnees['PM'].';');
    fputs($file,$donnees['PA'].';');
    fputs($file,$donnees['PV'].';');
    fclose($file);
    return true;
}

public static function getPrixConference()
{
	$file=fopen('../BackOffice/config/files/conferencePrice.txt','r');
	if($file==false)
	return false;
	$ligne=fgets($file);
	$arrayconf=explode(';', $ligne);                                      
	$wrapper=new WrapperPrix();
	$wrapper->setPrixAuteur($arrayconf[1]);
	$wrapper->setPrixMembre($arrayconf[0]);
	$wrapper->setPrixVisiteur($arrayconf[2]);
	fclose($file);
	return $wrapper;
}





}
?>