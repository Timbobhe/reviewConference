<?php


 class MembreComiteParticipant extends Participant {
    
 	protected $participant;
    protected $pswd;
 	
 	
 	
 	   function getPswd(){
			
			return $this->pswd;
			
		}
		
		function setPswd($pswd){
			
			$this->pswd=$pswd;
			
		}
 	
 	
 	public function __construct(array $donnees)
	{
		$this->hydrate($donnees);

	}
 

	public function setParticipant($val)
	{
		$this->participant=$val;
	}
	
	public function getParticipant()
	{
		return $this->participant;
	}
	
	
 }