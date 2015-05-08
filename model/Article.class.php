
<?php

class Article {
	
private $id;
private $langueArticle;
private $titre;
private $themePrincipal;
private $themesecondaire;
private $typeParticipation;
private $languePresentation;
private $format;
private $url;
private $resume;
private $listMotClefs;



		public function __construct(array $donnees)
		{
		    foreach ($donnees as $key => $value)
		    {
		
				$method = 'set'.ucfirst($key);
		        
		        // Si le setter correspondant existe
		        if (method_exists($this, $method))
		        {
		            // On appelle le setter
		            $this->$method($value);
		        }
		    }
		}


						public function getLangueArticle()
						{
						return $this->langueArticle;
						}
						public function getTitre()
						{
						return $this->titre;
						}
						public function getThemePrincipal()
						{
						return $this->themePrincipal;
						}
						public function getThemesecondaire()
						{
						return $this->themesecondaire;
						}
						public function getTypeParticipation()
						{
						return $this->typeParticipation;
						}
						public function getLanguePresentation()
						{
						return $this->languePresentation;
						}
						
						public function getFormat()
						{
						return $this->format;
						}
						public function getUrl()
						{
						return $this->url;
						}
						public function getResume()
						{
						return $this->resume;
						}
						public function getListMotClefs()
						{
						return $this->listMotClefs;
						}
						public function getId()
						{
						return $this->id;
						}
						
						//setters
						
						
						public function setLangueArticle($langueArticle)
						{
						 $this->langueArticle=$langueArticle;
						}
						public function setTitre($titre)
						{
						 $this->titre=$titre;
						}
						public function setThemePrincipal($themePrincipal)
						{
						 $this->themePrincipal=$themePrincipal;
						}
						public function setThemesecondaire($themesecondaire)
						{
						 $this->themesecondaire=$themesecondaire;
						}
						public function setTypeParticipation($typeParticipation)
						{
						 $this->typeParticipation=$typeParticipation;
						}
						public function setFormat($format)
						{
						 $this->format=$format;
						}
						public function setUrl($url)
						{
						 $this->url=$url;
						}
						public function setResume($resume)
						{
						 $this->resume=$resume;
						}
						public function setListMotClefs($listMotClefs)
						{
						 $this->listMotClefs=$listMotClefs;
						}
						public function setLanguePresentation($languePresentation)
						{
						 $this->languePresentation=$languePresentation;
						}
						public function setId($id)
						{
						 $this->id=$id;
						}
						
						
						
						
						}
						
						
?>  
						 
