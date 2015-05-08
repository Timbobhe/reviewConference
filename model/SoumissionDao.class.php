<?php


	class SoumissionDao {
		
		
		 	
		public static function add(Soumission $soumission)
        {
            
       		$pdo= DAO::getPDO();
        	$q = $pdo->prepare('INSERT INTO soumission SET
			idArticle = :idArticle, idAuteur = :idAuteur, statut = :statut');
       
	        $q->bindValue(':idArticle', $soumission->getIdArticle());
	        $q->bindValue(':idAuteur', $soumission->getIdAuteur());
	        $q->bindValue(':statut', $soumission->getStatut());

            
            $q->execute();
            
           
        }
        
        
	 public static  function delete(Soumission $soumission)
	        {
	        	$pdo= DAO::getPDO();
	            $pdo->exec('DELETE FROM soumission WHERE id ='.$soumission->getId());
	        }
            
	        
	 public static  function get($id)
	        {
	  			$id=(int)$id;
	            $pdo= DAO::getPDO();
	            $q = $pdo->query('SELECT * FROM soumission WHERE id ='.$id);
	            $donnees = $q->fetch(PDO::FETCH_ASSOC);
	            if($donnees == false) return false;
	            return new Soumission($donnees);
	        }	
	      
	        public static  function gets($idArticle)
	        {
	  			$idArticle=(int)$idArticle;
	            $pdo= DAO::getPDO();
	            $q = $pdo->query('SELECT * FROM soumission WHERE idArticle ='.$idArticle);
	            $donnees = $q->fetch(PDO::FETCH_ASSOC);
	            
	            return new Soumission($donnees);
	        }
	        
		public static function getList()
        {
        	$pdo= DAO::getPDO();
            $aut = array();
            
            $q = $pdo->query('SELECT * FROM soumission ');
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $aut[] = new Soumission($donnees);
            }
            
            return $aut;
        }
        
        	public static function getList1($idAuteur)
        {
        	$pdo= DAO::getPDO();
            $soum = array();
            
            $q = $pdo->query('SELECT * FROM soumission where idAuteur ="'.$idAuteur.'"');
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $soum[] = new Soumission($donnees);
            }
            
            return $soum;
        }
        
        
        
		public static  function update1(Soumission $soum)
		{
				$pdo= DAO::getPDO();
		        $q = $pdo->prepare('UPDATE soumission SET
				statut = :statut where idArticle=:id');

	        $q->bindValue(':statut', $soum->getStatut());
		    $q->bindValue(':id', $soum->getIdArticle(), PDO::PARAM_INT);
		            
		            $q->execute();
	      }
	    
    public static function updateStatus($statut,$idarticle)
    {
    	        $pdo=DAO::getPDO();
    	        $q = $pdo->prepare('UPDATE soumission SET
				statut = :statut where idArticle=:id');
		        $success=$q->execute(array('statut'=>$statut,'id'=>$idarticle));
		        return $success;
    }	    
	
	public function count()
	{
		$donnees=$this->getList();
		return count($donnees);
		
	}
	
		
	 public static function getLastId()
        {
        	$pdo= DAO::getPDO();

            $q = $pdo->query('select max(id) from soumission');
            
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
         	
            return $donnees;
        }

	public static function getNotrevisedSoumission()
	{
		$bdd=DAO::getPDO();
		$req=$bdd->prepare('SELECT article.`themePrincipal` , soumission.`idArticle`
        FROM article, soumission
        WHERE soumission.`statut` =1
        AND article.`id` = soumission.`idArticle`
        LIMIT 0 , 30');
		$array=array();
		$req->execute();
		while($donnees=$req->fetch())
		{
			$array[]=new wrapperSoumission($donnees);
		}
//		if(sizeof($array)==0)
//		return flase;
//		else 
		return $array;
	}
	
	}
		


?>