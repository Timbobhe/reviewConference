<?php


 class ArticleDao {
	

 	
 	
 	public static  function add(Article $article)
        {
            $pdo= DAO::getPDO();
       
        	$q = $pdo->prepare('INSERT INTO article SET
			langueArticle = :langueArticle, titre = :titre, themePrincipal = :themePrincipal, themesecondaire = :themesecondaire,
			typeParticipation = :typeParticipation, languePresentation= :languePresentation, format = :format, url = :url, resume = :resume, listMotClefs = :listMotClefs');
       
	        $q->bindValue(':langueArticle', $article->getLangueArticle());
	        $q->bindValue(':titre', $article->getTitre());
	        $q->bindValue(':themePrincipal', $article->getThemePrincipal());
	        $q->bindValue(':themesecondaire', $article->getThemesecondaire());
	        $q->bindValue(':typeParticipation', $article->getTypeParticipation());
	        $q->bindValue(':languePresentation', $article->getLanguePresentation());
	        $q->bindValue(':format', $article->getFormat());
	        $q->bindValue(':url', $article->getUrl());
	        $q->bindValue(':resume', $article->getResume());
	        $q->bindValue(':listMotClefs', $article->getListMotClefs());

            
            $q->execute();
        }
        
        
	 public static function delete(Article $article)
	        {
	        	$pdo= DAO::getPDO();
	            $pdo->exec('DELETE FROM article WHERE id ='.$article->getId());
	        }
            
	        
	 public static function get($id)
	        {
	        	$pdo= DAO::getPDO();
	            $id = (int) $id;
	            
	            $q = $pdo->query('SELECT * FROM article WHERE id = '.$id);
	            $donnees = $q->fetch(PDO::FETCH_ASSOC);
	            
	            return new Article($donnees);
	        }	

 public static function getList()
        {
        	$pdo= DAO::getPDO();
            $aut = array();
            
            $q = $pdo->query('SELECT * FROM article ');
            
            while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
            {
                $aut[] = new Article($donnees);
            }
            
            return $aut;
        }
        
 
 public static function getLastId()
        {
        	$pdo= DAO::getPDO();

            $q = $pdo->query('select max(id) from article');
            
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
         	
            return $donnees;
        }
        
        
        
        
  public static function update(Article $article)
		{
				$pdo= DAO::getPDO();
		        $q = $pdo->prepare('UPDATE article SET
				langueArticle = :langueArticle, titre = :titre, themePrincipal = :themePrincipal, themesecondaire = :themesecondaire,
				typeParticipation = :typeParticipation, languePresentation= :languePresentation, format = :format, url = :url,
				resume = :resume, listMotClefs = :listMotClefs 
				where id=:id');
		            
		    $q->bindValue(':langueArticle', $article->getLangueArticle());
	        $q->bindValue(':titre', $article->getTitre());
	        $q->bindValue(':themePrincipal', $article->getThemePrincipal());
	        $q->bindValue(':themesecondaire', $article->getThemesecondaire());
	        $q->bindValue(':typeParticipation', $article->getTypeParticipation());
	        $q->bindValue(':languePresentation', $article->getLanguePresentation());
	        $q->bindValue(':format', $article->getFormat());
	        $q->bindValue(':url', $article->getUrl());
	        $q->bindValue(':resume', $article->getResume());
	        $q->bindValue(':listMotClefs', $article->getListMotClefs());
		    $q->bindValue(':id', $article->getId(), PDO::PARAM_INT);
		            
		            $q->execute();
		        }
            
      public static  function Count()
        {
        	$donnees=self::getList();
        	return count($donnees);
        }
        
}
      

?>
