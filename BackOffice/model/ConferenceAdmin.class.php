<?php

class ConferenceAdmin{
	
public static function saveConference(Conference $conference,$lang)
{
	
	$file=fopen('../../FrontOffice/files/'.$lang.'ConferenceDetails.txt','w');
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
    fputs($file,$conference->getDescription().';');
	fputs($file,$conference->getNom());
    
    fclose($file);
    return true;
}

public static function getConference($lang)
{
	$file=fopen('../FrontOffice/files/'.$lang.'ConferenceDetails.txt','r');
	if($file==false)
	return false;
	$ligne=fgets($file);
	$arrayconf=explode(';', $ligne);
	$donnees=array('theme'=>$arrayconf[0],'date'=>$arrayconf[1],'lieu'=>$arrayconf[2],'datelimite'=>$arrayconf[3],'tel'=>$arrayconf[4],'fax'=>$arrayconf[5],'pays'=>$arrayconf[6],'codepostale'=>$arrayconf[7],'description'=>$arrayconf[8],'nom'=>$arrayconf[9]);                                          
	$conference=new Conference($donnees);
	fclose($file);
	return $conference;
}

public static function getConferenceSite($lang)
{
	$file=fopen('files/'.$lang.'ConferenceDetails.txt','r');
	if($file==false)
	return false;
	$ligne=fgets($file);
	$arrayconf=explode(';', $ligne);
	$donnees=array('theme'=>$arrayconf[0],'date'=>$arrayconf[1],'lieu'=>$arrayconf[2],'datelimite'=>$arrayconf[3],'tel'=>$arrayconf[4],'fax'=>$arrayconf[5],'pays'=>$arrayconf[6],'codepostale'=>$arrayconf[7],'description'=>$arrayconf[8],'nom'=>$arrayconf[9]);                                          
	$conference=new Conference($donnees);
	fclose($file);
	return $conference;
}

public static function dropConference(){
	unlink('conference');
}

}
?>