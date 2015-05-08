<?php

class ComiteParticipantDao{
	
    const FILTRE_PAYS=pays;
	const FILTRE_NATIONALITE=nationalite;
	const FILTRE_LABO=laboratoire;
	const FILTRE_TEAM=equipe; 
	const FILTRE_INSTITUTION=institution;
	const FILTRE_THEME=theme;
	
	/**
	 * 
	 * Enter description here ...
	 * @param MembreComite $membreParticipant
	 * @return true o success,false otherwise
	 */
	
	
	
	public static function inscrire(MembreComite $membreParticipant)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('UPDATE `callForPaper`.`membrecomite` SET `participant` =1,`numpasseport` =?
		 WHERE `membrecomite`.`email`=? and `membrecomite`.`pswd`=?;');
        $success=$req->execute(array($membreParticipant->getNumpasseport(),$membreParticipant->getEmail(),$membreParticipant->getPswd())); 
        return $success;	
	}
	
	
	
	public static function get($mail)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('SELECT * FROM `membrecomite` WHERE `email`=? and `participant`=1;');
		$success=$req->execute(array($mail));
		if(!$success)
		return $success;
		$membreParticipant=new MembreComiteParticipant($req->fetch(PDO::FETCH_ASSOC));
		return $membreParticipant;
		
	}
		
	
    public static function filtre($critere=null,$value=null)
	{
		$bdd=DAO::getPDO();
		if($critere==null && $value==null)
		{
		$req=$bdd->prepare('SELECT * FROM `membrecomite` WHERE `participant`=1;');
		$success=$req->execute();
		}
		elseif ($critere==null || $value==null)
		return false;
		else 
		{
		$req=$bdd->prepare('SELECT * FROM `membrecomite` WHERE '.$critere.'=? and `participant`=1;');
		$success=$req->execute(array($value));		
		}
	    if(!$success)
		return $success;
		$participants=array();	
		while($donnees=$req->fetch(PDO::FETCH_ASSOC))
		{
			$participants[]=new MembreComiteParticipant($donnees);
		}
		  
		return $participants;
		
	}
	
	
	public static function count($critere=null,$value=null)
	{
		$paricipant=self::filtre($critere,$value);
		if($paricipant!=false)
		return  count($paricipant);
		return false;
		
	}	
	
	
	public static function desinscrire(MembreComiteParticipant $membreparticipant)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('UPDATE `callForPaper`.`membrecomite` SET `participant` =0,`numpasseport` =?
		 WHERE `membrecomite`.`email`=? and `membrecomite`.`pswd`=?;');
        $success=$req->execute(array(null,$membreparticipant->getEmail(),$membreparticipant->getPswd())); 
		return $success;
		
	}
	
}
?>