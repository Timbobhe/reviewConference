<?php 

class Revision {
	
	//Attribus
private $id;
private $pertinence;
private $pertinenceComment;
private $clarete;
private $clareteComment;
private $importance;
private $importanceComment;
private $originalite;
private $originaliteComment;
private $qualiteScientifique;
private $qualiteScientifiqueComment;
private $impact;
private $impactComment;
private $suggestions;
private $terminee;
private $idMembreComite;
private $idArticle;

// constructeur
		public function __construct($donnees){
		
	foreach ($donnees as $key => $value)
	    {
	
			$method = 'set'.ucfirst($key);
	        
	        // Si le setter correspondant existe
	        if (method_exists($this, $method))
	        {
	            // On appelle le setter
	            $this->$method($value);
	        }
	        else {
	        	
	        	
	        	echo 'method introuvable'.$method;
	        }
	    }
		
		}

	
	
	public function getId(){
		
		return $this->id;
	}
	
	public function setId($id){
		
		$this->id=$id;
	}

	public function getPertinence() {
		return $this->pertinence;
	}


	public function setPertinence($pertinence) {
		$this->pertinence = $pertinence;
	}


	public function getPertinenceComment() {
		return $this->pertinenceComment;
	}


	public function setPertinenceComment($pertinenceComment) {
		$this->pertinenceComment = $pertinenceComment;
	}


	public function getClarete() {
		return $this->clarete;
	}


	public function setClarete($clarete) {
		$this->clarete = $clarete;
	}


	public function getClareteComment() {
		return $this->clareteComment;
	}


	public function setClareteComment($clareteComment) {
		$this->clareteComment = $clareteComment;
	}


	public function getImportance() {
		return $this->importance;
	}


	public function setImportance($importance) {
		$this->importance = $importance;
	}


	public function getImportanceComment() {
		return $this->importanceComment;
	}


	public function setImportanceComment($importanceComment) {
		$this->importanceComment = $importanceComment;
	}


	public function getOriginalite() {
		return $this->originalite;
	}


	public function setOriginalite($originalite) {
		$this->originalite = $originalite;
	}


	public function getOriginaliteComment() {
		return $this->originaliteComment;
	}


	public function setOriginaliteComment($originaliteComment) {
		$this->originaliteComment = $originaliteComment;
	}


	public function getQualiteScientifique() {
		return $this->qualiteScientifique;
	}


	public function setQualiteScientifique($qualiteScientifique) {
		$this->qualiteScientifique = $qualiteScientifique;
	}


	public function getQualiteScientifiqueComment() {
		return $this->qualiteScientifiqueComment;
	}


	public function setQualiteScientifiqueComment($qualiteScientifiqueComment) {
		$this->qualiteScientifiqueComment = $qualiteScientifiqueComment;
	}


	public function getImpact() {
		return $this->impact;
	}


	public function setImpact($impact) {
		$this->impact = $impact;
	}


	public function getImpactComment() {
		return $this->impactComment;
	}


	public function setImpactComment($impactComment) {
		$this->impactComment = $impactComment;
	}


	public function getSuggestions() {
		return $this->suggestions;
	}


	public function setSuggestions($suggestions) {
		$this->suggestions = $suggestions;
	}
	
	public function getTerminee() {
		return $this->terminee;
	}


	public function setTerminee($termine) {
		$this->terminee = $termine;
	}


	public function getIdMembreComite() {
		return $this->idMembreComite;
	}


	public function setIdMembreComite($idMembreComite) {
		$this->idMembreComite = $idMembreComite;
	}
	
	public function getIdArticle() {
		return $this->idArticle;
	}
	
	public function setIdArticle($idArticle) {
		$this->idArticle = $idArticle;
	}

	
}

?>