<?php

class SimpleParticipantDao{

	public static function inscrire(SimpleParticipant $simpleParticipant)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('INSERT INTO `cfp`.`simpleparticipant` (`nom`, `prenom`, `email`, `cpostale`, `numpasseport`, `tel`, `pays`, `nationalite`, `institution`, `laboratoire`, `equipe`) VALUES (?,?,?,?,?,?,?,?,?,?,?);');
        $success=$req->execute(array($simpleParticipant->getNom(),$simpleParticipant->getPrenom(),
        $simpleParticipant->getEmail(),$simpleParticipant->getCPostale(),$simpleParticipant->getNumpasseport(),$simpleParticipant->getTel(),
        $simpleParticipant->getPays(),$simpleParticipant->getNationalite(),
        $simpleParticipant->getInstitution(),$simpleParticipant->getLaboratoire(),$simpleParticipant->getEquipe())); 
		return $success;	
	}
	
	
	
	public static function get($mail)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('SELECT * FROM `simpleparticipant` WHERE `email`=?;');
		$req->execute(array($mail));
		$donnees=$req->fetch(PDO::FETCH_ASSOC);
		if($donnees==false)
		return $donnees;
		$simpleParticipant=new SimpleParticipant($donnees);
		return $simpleParticipant;
		
	}
	
	public static function getById($id)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('SELECT * FROM `simpleparticipant` WHERE id=?;');
		$success=$req->execute(array($id));
		if(!$success)
		return $success;
		$simpleParticipant=new SimpleParticipant($req->fetch(PDO::FETCH_ASSOC));
		return $simpleParticipant;
		
	}
	
	
	public static function remove(SimpleParticipant $simpleParticipant)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('DELETE FROM `cfp`.`simpleparticipant` WHERE `simpleparticipant`.`email`=? OR `simpleparticipant`.`id`=? ;');
		$success=$req->execute(array($simpleParticipant->getEmail(),$simpleParticipant->getId()));
		return $success;
		
	}
	
	
	
    public static function filtre($critere=null,$value=null)
	{
		$bdd=DAO::getPDO();
		if($critere==null && $value==null)
		{
		$req=$bdd->prepare('SELECT * FROM `simpleparticipant`');
		$success=$req->execute();
		}
		elseif ($critere==null || $value==null)
		return false;
		else 
		{
		$req=$bdd->prepare('SELECT * FROM `simpleparticipant` WHERE '.$critere.'=?;');
		$success=$req->execute(array($value));		
		}
	    if(!$success)
		return $success;
		$participants=array();
		while($donnees=$req->fetch(PDO::FETCH_ASSOC))
		{
			$participants[]=new SimpleParticipant($donnees);
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
	
	
	public static function getStatistique($critere)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->query('SELECT  `'.$critere.'`,count(*) as nombre from simpleparticipant GROUP BY `'.$critere.'` ORDER BY `'.$critere.'`;');
		$result=array();
            	while($donnees=$req->fetch())
            	{
            		$result[$donnees[$critere]]=$donnees['nombre'];
            	}
            	return $result;
	}
	
	
	
}
?>