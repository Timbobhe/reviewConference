<?php


class AuteurPrincipalDao{

 	
 	
 	public static function add(AuteurPrincipal $auteur)
        {
            
       		$pdo= DAO::getPDO();
        	$q = $pdo->prepare('INSERT INTO auteurprincipal SET
			id = :id, nom = :nom, prenom = :prenom, email = :email,
			cpostale = :cpostale, tel= :tel, pays = :pays, institution = :institution, 
			nationalite = :nationalite, laboratoire = :laboratoire, equipe= :equipe, pswd= :pswd');
       
	        $q->bindValue(':id', $auteur->getId());
	        $q->bindValue(':nom', $auteur->getNom());
	        $q->bindValue(':prenom', $auteur->getPrenom());
	        $q->bindValue(':email', $auteur->getEmail());
	        $q->bindValue(':cpostale', $auteur->getCPostale());
	        $q->bindValue(':tel', $auteur->getTel());
	        $q->bindValue(':pays', $auteur->getPays());
	        $q->bindValue(':institution', $auteur->getInstitution());
	        $q->bindValue(':nationalite', $auteur->getNationalite());
	        $q->bindValue(':laboratoire', $auteur->getLaboratoire());
	        $q->bindValue(':equipe', $auteur->getEquipe());
	        $q->bindValue(':pswd', $auteur->getPswd());

            
            $q->execute();
            
           
        }
        
        
	 public static function delete(AuteurPrincipal $auteur)
	        {
	        	$pdo= DAO::getPDO();
	        	$soum = SoumissionDao::getList1($auteur->getId());
	        	
	        	foreach ($soum as $s){

	        		ArticleDao::delete(new Article(array('id'=>$s->getIdArticle())));
	        		
	        	}
	        	
	            $pdo->exec('DELETE FROM auteurprincipal WHERE id ="'.$auteur->getId().'"');
	        }
            
	        
	 public static  function get($id)
	        {
	  
	            $pdo= DAO::getPDO();
	            $q = $pdo->query('SELECT * FROM auteurprincipal WHERE id = "'.$id.'"');
	            $donnees = $q->fetch(PDO::FETCH_ASSOC);
	            
	            return new AuteurPrincipal($donnees);
	        }	  

	        
	public static  function getList()
        {
        	$pdo= DAO::getPDO();
            $aut = array();
            
            $q = $pdo->query('SELECT * FROM auteurprincipal ');
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $aut[] = new AuteurPrincipal($donnees);
            }
            
            return $aut;
        }
        
        
    public static  function isInscrit($login,$pass){
    	
    	$pdo= DAO::getPDO();
    	$q = $pdo->query('SELECT * FROM auteurprincipal WHERE email = "'.$login.'" and pswd="'.$pass.'"');
	    
    	$donnees = $q->fetch(PDO::FETCH_ASSOC);
    	
    	if ($donnees) return new AuteurPrincipal($donnees);
    	
    	else return null;  
  
	}
	
	
        public static function update(AuteurPrincipal $aut)
		{
				$pdo= DAO::getPDO();
		        $q = $pdo->prepare('UPDATE auteurprincipal SET
				nom = :nom, prenom = :prenom, email = :email, cpostale = :cpostale,
				tel = :tel, pays= :pays, nationalite = :nationalite,
				institution = :institution, laboratoire = :laboratoire, 
				equipe = :equipe,pswd=:pswd
				where id=:id');
		            
		    $q->bindValue(':nom', $aut->getNom());
	        $q->bindValue(':prenom', $aut->getPrenom());
	        $q->bindValue(':email', $aut->getEmail());
	        $q->bindValue(':cpostale', $aut->getCpostale());
	        $q->bindValue(':tel', $aut->getTel());
	        $q->bindValue(':pays', $aut->getPays());
	        $q->bindValue(':nationalite', $aut->getNationalite());
	        $q->bindValue(':institution', $aut->getInstitution());
	        $q->bindValue(':laboratoire', $aut->getLaboratoire());
	        $q->bindValue(':equipe', $aut->getEquipe());
	        $q->bindValue(':pswd', $aut->getPswd());
		    $q->bindValue(':id', $aut->getId());
		            
		            $q->execute();
		        }
	public static function update1(AuteurPrincipal $aut)
		{
				$pdo= DAO::getPDO();
		        $q = $pdo->prepare('UPDATE auteurprincipal SET
				nom = :nom, prenom = :prenom, email = :email, cpostale = :cpostale,
				tel = :tel, pays= :pays, nationalite = :nationalite,
				institution = :institution, laboratoire = :laboratoire, 
				equipe = :equipe
				where id=:id');
		            
		    $q->bindValue(':nom', $aut->getNom());
	        $q->bindValue(':prenom', $aut->getPrenom());
	        $q->bindValue(':email', $aut->getEmail());
	        $q->bindValue(':cpostale', $aut->getCpostale());
	        $q->bindValue(':tel', $aut->getTel());
	        $q->bindValue(':pays', $aut->getPays());
	        $q->bindValue(':nationalite', $aut->getNationalite());
	        $q->bindValue(':institution', $aut->getInstitution());
	        $q->bindValue(':laboratoire', $aut->getLaboratoire());
	        $q->bindValue(':equipe', $aut->getEquipe());
		    $q->bindValue(':id', $aut->getId());
		            
		            $q->execute();
		        }
	
      public static function count()
      {
	   return count(self::getList());
      }


	}


?>