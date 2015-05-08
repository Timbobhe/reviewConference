<?php
class MembreComiteDao{
	
	const FILTRE_PAYS=pays;
	const FILTRE_NATIONALITE=nationalite;
	const FILTRE_LABO=laboratoire;
	const FILTRE_TEAM=equipe; 
	const FILTRE_INSTITUTION=institution;
	const FILTRE_THEME=theme;
	
	
	public static  function add(MembreComite $membrecomite)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('INSERT INTO `cfp`.`membrecomite` (`id`,`nom`, `prenom`, `email`, `cpostale`, `tel`, `pays`, `nationalite`, `institution`, `laboratoire`, `equipe`, `theme`, `pswd`)
		VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);');
		$success=$req->execute(array($membrecomite->getId(),$membrecomite->getNom(),$membrecomite->getPrenom(),
		$membrecomite->getEmail(),$membrecomite->getCpostale(),$membrecomite->getTel(),
		$membrecomite->getPays(),$membrecomite->getNationalite(),$membrecomite->getInstitution(),
		$membrecomite->getLaboratoire(),$membrecomite->getEquipe(),$membrecomite->getTheme(),$membrecomite->getPswd()));
		return $success;
	}
	
	/**
	 * 
	 * recuperer un membre de comite a partir de son email et mot de pass
	 * permet aussi de verifier si un membre est inscrit
	 * @param unknown_type $email
	 * @return MembreComite on cas de succee,si non false
	 */
	
   public static function get($email,$pass)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('SELECT * FROM `membrecomite` WHERE `email`=? and `pswd`=?;');
		$success=$req->execute(array($email,$pass));
		$donnee=$req->fetch(PDO::FETCH_ASSOC);
		if($donnee==false)
		{
			return false;
		}
		else{
			$membre=new MembreComite($donnee);	
			return $membre;	
		}
	}
	
	
	public static function getByid($id)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('SELECT * FROM `membrecomite` WHERE `id`=?');
		$req->execute(array($id));
		$donnee=$req->fetch(PDO::FETCH_ASSOC);
		if($donnee==false)
		{
			return false;
		}
		else{
			$membre=new MembreComite($donnee);	
			return $membre;	
		}
	}
	
	
	
  public static function filtre($critere=null,$value=null)
	{
		$bdd=DAO::getPDO();
		if($critere==null && $value==null)
		{
		$req=$bdd->prepare('SELECT * FROM `membrecomite` GROUP BY `theme` , `nom` , `prenom`');
		$success=$req->execute();
		}
		elseif ($critere==null || $value==null)
		return false;
		else 
		{
		$value=strtolower($value);	
		$req=$bdd->prepare('SELECT * FROM `membrecomite` WHERE '.$critere.'=?;');
		$success=$req->execute(array($value));		
		}
	    if(!$success)
		return $success;
		$participants=array();
		while($donnees=$req->fetch(PDO::FETCH_ASSOC))
		{
			$participants[]=new MembreComite($donnees);
		}
		return $participants;
		
	}
	
	public static function remove(MembreComite $membre)
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('DELETE FROM `cfp`.`membrecomite` WHERE `membrecomite`.`email` =? and `membrecomite`.`pswd`=?');
		$success=$req->execute(array($membre->getEmail(),$membre->getPswd()));
		return $success;
	}
	

	public static function count($critere=null,$value=null)
	{
		$paricipant=self::filtre($critere,$value);
		if($paricipant!=false)
		return  count($paricipant);
		return false;
		
	}
	
	
   public static function getMembreCoPartiStati($filtre)
            {
            	$bdd=DAO::getPDO();
            	$req=$bdd->query('SELECT  count(*) as nombre,`'.$filtre.'` from membrecomite where participant=1 GROUP BY `'.$filtre.'` ORDER BY `'.$filtre.'`;');
            	$result=array();
            	while($donnees=$req->fetch())
            	{
            		$result[$donnees[$filtre]]=$donnees['nombre'];
            	}
            	return $result;
            }
	
    public static function getnbrParticipant()
    {
    	$bdd=DAO::getPDO();
    	$req=$bdd->query('SELECT  count(*) as nombre from membrecomite where participant=1');
    	$donnees=$req->fetch();
    	return $donnees['nombre'];
    }

       public static function update(MembreComite $mbr)
		{
				$pdo= DAO::getPDO();
		        $q = $pdo->prepare('UPDATE `cfp`.`membrecomite` SET
				nom = :nom, prenom = :prenom, email = :email, cpostale = :cpostale,
				tel = :tel, pays= :pays, nationalite = :nationalite,
				institution = :institution, laboratoire = :laboratoire, 
				equipe = :equipe,theme= :theme,pswd=:pswd
				where id=:id');
		            
		    $q->bindValue(':nom', $mbr->getNom());
	        $q->bindValue(':prenom', $mbr->getPrenom());
	        $q->bindValue(':email', $mbr->getEmail());
	        $q->bindValue(':cpostale', $mbr->getCpostale());
	        $q->bindValue(':tel', $mbr->getTel());
	        $q->bindValue(':pays', $mbr->getPays());
	        $q->bindValue(':nationalite', $mbr->getNationalite());
	        $q->bindValue(':institution', $mbr->getInstitution());
	        $q->bindValue(':laboratoire', $mbr->getLaboratoire());
	        $q->bindValue(':equipe', $mbr->getEquipe());
	        $q->bindValue(':theme', $mbr->getTheme());
	        $q->bindValue(':pswd', $mbr->getPswd());
		    $q->bindValue(':id', $mbr->getId());
		            
		            $q->execute();
		        }
        
public static function update1(MembreComite $mbr)
		{
				$pdo= DAO::getPDO();
		        $q = $pdo->prepare('UPDATE `cfp`.`membrecomite` SET
				nom = :nom, prenom = :prenom, email = :email, cpostale = :cpostale,
				tel = :tel, pays= :pays, nationalite = :nationalite,
				institution = :institution, laboratoire = :laboratoire, 
				equipe = :equipe,theme= :theme
				where id=:id');
		            
		    $q->bindValue(':nom', $mbr->getNom());
	        $q->bindValue(':prenom', $mbr->getPrenom());
	        $q->bindValue(':email', $mbr->getEmail());
	        $q->bindValue(':cpostale', $mbr->getCpostale());
	        $q->bindValue(':tel', $mbr->getTel());
	        $q->bindValue(':pays', $mbr->getPays());
	        $q->bindValue(':nationalite', $mbr->getNationalite());
	        $q->bindValue(':institution', $mbr->getInstitution());
	        $q->bindValue(':laboratoire', $mbr->getLaboratoire());
	        $q->bindValue(':equipe', $mbr->getEquipe());
	        $q->bindValue(':theme', $mbr->getTheme());
		    $q->bindValue(':id', $mbr->getId());
		            
		            $q->execute();
		        }
            
            
}