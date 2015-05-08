<?php

		class RevisionDao {
 	

		public static  function add(Revision $revision)
        {
            $pdo= DAO::getPDO();
       
        	$q = $pdo->prepare('INSERT INTO revision SET idMembreComite= :idMembreComite, idArticle= :idArticle,terminee= :terminee');
       
	 
	        $q->bindValue(':idMembreComite', $revision->getIdMembreComite());
	        $q->bindValue(':idArticle', $revision->getIdArticle());
	        $q->bindValue(':terminee', $revision->getTerminee());

            
            $q->execute();
            
        }	
        
        
	 public static function delete(Revision $revision)
	        {
	        	$bdd=DAO::getPDO();
	            $bdd->exec('DELETE FROM revision WHERE id ='.$revision->getId());
	        }
	        
	public static function delete1($idArticle)
	        {
	        	$bdd=DAO::getPDO();
	            $bdd->exec('DELETE FROM revision WHERE idArticle ='.$idArticle);
	        }
            
	        
	 public static function get($id)
	        {
	  
	            $bdd=DAO::getPDO();
	            $q = $bdd->query('SELECT * FROM revision WHERE id ='.$id);
	            $donnees = $q->fetch(PDO::FETCH_ASSOC);
	            if($donnees==false)
	            return false;
	            
	            return new Revision($donnees);
	        }	 
	        
	
	
	
	   public function getList()
        {
            $revision = array();
            
            $q = $this->pdo->query('SELECT * FROM revision ');
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $revision[] = new Revision($donnees);
            }
            
            return $revision;
        }
        
		public static function getList1($idMbrComite)
        {
        	
        	$pdo= DAO::getPDO();
            $revision = array();
            
            $q = $pdo->query('SELECT * FROM revision where idMembreComite="'.$idMbrComite.'" and terminee=1');
            
        
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $revision[] = new Revision($donnees);
            }
            
            return $revision;
        }
        
        
		public static function getList2($idMbrComite)
        {
        	
        	$pdo= DAO::getPDO();
            $revision = array();
            
            $q = $pdo->query('SELECT * FROM revision where idMembreComite="'.$idMbrComite.'" and terminee=3');
            
        
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $revision[] = new Revision($donnees);
            }
            
            return $revision;
        }
        
        
				public static function update(Revision $rev)
		{
				$pdo= DAO::getPDO();
		        $q = $pdo->prepare('UPDATE revision SET
				pertinence = :pertinence, pertinenceComment = :pertinenceComment, clarete = :clarete, clareteComment = :clareteComment,
				importance = :importance, importanceComment= :importanceComment, originalite = :originalite, originaliteComment = :originaliteComment,
				qualiteScientifique = :qualiteScientifique, qualiteScientifiqueComment = :qualiteScientifiqueComment, 
				impact = :impact, impactComment = :impactComment, 
				suggestions = :suggestions,terminee= :terminee
				where id=:id');
		            
		    $q->bindValue(':pertinence', $rev->getPertinence());
	        $q->bindValue(':pertinenceComment', $rev->getPertinenceComment());
	        $q->bindValue(':clarete', $rev->getClarete());
	        $q->bindValue(':clareteComment', $rev->getClareteComment());
	        $q->bindValue(':importance', $rev->getImportance());
	        $q->bindValue(':importanceComment', $rev->getImportanceComment());
	        $q->bindValue(':originalite', $rev->getOriginalite());
	        $q->bindValue(':originaliteComment', $rev->getOriginaliteComment());
	        $q->bindValue(':qualiteScientifique', $rev->getQualiteScientifique());
	        $q->bindValue(':qualiteScientifiqueComment', $rev->getQualiteScientifiqueComment());
	        $q->bindValue(':impact', $rev->getImpact());
	        $q->bindValue(':impactComment', $rev->getImpactComment());
	        $q->bindValue(':suggestions', $rev->getSuggestions());
	        $q->bindValue(':terminee', $rev->getTerminee());
		    $q->bindValue(':id', $rev->getId(), PDO::PARAM_INT);
		            
		            $q->execute();
		    }
		 
		 
		 
		 public static  function getRevisionList()
		 {
		 	$bdd=DAO::getPDO();
		 	$revision=array();
		 	$req=$bdd->prepare('SELECT revision.`idArticle`,revision.`idMembreComite`,`soumission`.`id` as id ,article.`titre`,article.`themePrincipal`,membrecomite.`nom` as nommembre,membrecomite.`prenom`  as prenommembre,`statut`,auteurprincipal.`nom`  as nomauteur ,auteurprincipal.`prenom`  as auteurprenom  from article,membrecomite,revision,soumission,auteurprincipal  where  revision.`idArticle`=article.`id`   and revision.`idMembreComite`=membrecomite.`id` and revision.`idArticle`=soumission.`idArticle` and auteurprincipal.`id`=soumission.`idAuteur`');
		 	$req->execute();
		 	while($donnees=$req->fetch())
		 	{
		 		$wrapper = new  WrapperRevision($donnees);
		 		$wrapper->setMoy(RevisionDao::getmoyenne($donnees['idArticle'], $donnees['idMembreComite']));
		 		$revision[]= $wrapper;
		 	}
		 	return $revision;
		 }
		 
		 
		public static function getmoyenne($idarticle,$idmembre)
		 {
		 	
		 	$bdd=DAO::getPDO();
		 	$req=$bdd->prepare('SELECT `pertinence` , `clarete` , `importance` , `originalite` , `qualiteScientifique` , `impact`
              FROM revision WHERE `idMembreComite` ="'.$idmembre.'" AND `idArticle`='.$idarticle.';');
		 	$req->execute();
		 	$donnee=$req->fetch();
		 	if(!$donnee)
		 	return false;
		 	else 
		 	return  round(array_sum($donnee)/6,2) ;
		 }
		
		}
?>