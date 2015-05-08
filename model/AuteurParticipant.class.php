<?php

  class AuteurParticipant extends Participant {
  	

  	private $idArticle ;

  	
		public function __construct(array $donnees){	


	$this->hydrate($donnees);
	
}
  	
  	
  	
	
  	function getIdArticle(){
		
		return $this->idArticle;
	}
	
	function setIdArticle($idArticle){
		
		$this->idArticle=$idArticle;
	}
	
  }

?>