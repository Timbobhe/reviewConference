<?php


	class AuteurParticipantDao{


 	
 	
 	public static function add(AuteurParticipant $auteur)
        {
            
       		$pdo= DAO::getPDO();
        	$q = $pdo->prepare('INSERT INTO auteurparticipant SET
			id = :id, idArticle = :idArticle, numpasseport = :numpasseport');
       
	        $q->bindValue(':id', $auteur->getId());
	        $q->bindValue(':idArticle', $auteur->getIdArticle());
	        $q->bindValue(':numpasseport', $auteur->getNumpasseport());

            
            $q->execute();
            
           
        }
        
		public static  function isInscrit($id){
				
				$pdo= DAO::getPDO();
				$q = $pdo->query('SELECT * FROM auteurparticipant WHERE id="'.$id.'"');
				
				$donnees = $q->fetch(PDO::FETCH_ASSOC);
				
				if ($donnees) return new AuteurPrincipal($donnees);
				
				else return false;  
		  
			}
        
        
	 public static function delete(AuteurParticipant $auteur)
	        {
	        	$pdo= DAO::getPDO();
	            $pdo->exec('DELETE FROM auteurparticipant WHERE id ="'.$auteur->getId().'"');
	        }
            
	        
	 public static function get($id)
	        {
	  
	            $pdo= DAO::getPDO();
	            $q = $pdo->query('SELECT * FROM auteurparticipant WHERE id = "'.$id.'"');
	            $donnees = $q->fetch(PDO::FETCH_ASSOC);
	            
	            return new AuteurParticipant($donnees);
	        }	 

	        
	public static function getList()
        {
        	
        	$pdo= DAO::getPDO();
            $aut = array();
            
            //$q = $pdo->query('SELECT * from auteursecondaire,auteurparticipant where auteurparticipant .`id`=auteursecondaire.`id`');
			$q = $pdo->query('SELECT * from auteurparticipant');
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $aut[] = new AuteurParticipant($donnees);
            }
            
           $q = $pdo->query('SELECT  * from auteurprincipal,auteurparticipant where auteurparticipant .`id`=auteurprincipal.`id`');
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $aut[] = new AuteurParticipant($donnees);
            }
            
            
            return $aut;
        }
            
            
            
            public static  function getAuteurPrinStati($filtre)
            {
            	
            	$bdd=DAO::getPDO();
            	$req=$bdd->query('SELECT  count(*) as nombre,`'.$filtre.'` from auteurprincipal,auteurparticipant where auteurparticipant .`id`=auteurprincipal.`id` GROUP BY `'.$filtre.'` ORDER BY `'.$filtre.'`;');
            		$result=array();
            	while($donnees=$req->fetch())
            	{
            		$result[$donnees[$filtre]]=$donnees['nombre'];
            	}
            	return $result;
            }
            
            
            
            
            
	         public static function getAuteurSeconStati($filtre)
            {
            	$bdd=DAO::getPDO();
            	$req=$bdd->query('SELECT  count(*) as nombre,`'.$filtre.'` from auteursecondaire,auteurparticipant where auteurparticipant .`id`=auteursecondaire.`id` GROUP BY `'.$filtre.'` ORDER BY `'.$filtre.'`;');
            	$result=array();
            	while($donnees=$req->fetch())
            	{
            		$result[$donnees[$filtre]]=$donnees['nombre'];
            	}
            	return $result;
            }
                   
	   
            public static function getNombreParticipant()
            {
            	$bdd=DAO::getPDO();
            	$req1=$bdd->query('SELECT  count(*) as nombre from auteursecondaire,auteurparticipant where auteurparticipant .`id`=auteursecondaire.`id`');
            	$req2=$bdd->query('SELECT  count(*) as nombre from auteurprincipal,auteurparticipant where auteurparticipant .`id`=auteurprincipal.`id`');
                $donnee1=$req1->fetch(); 
                $donnee2=$req2->fetch();
                return $donnee1['nombre']+$donnee2['nombre'];
            
            }
            
            
            

	}


?>