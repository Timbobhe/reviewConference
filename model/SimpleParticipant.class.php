<?php

class SimpleParticipant extends Participant{
		
public function __construct(array $donnees)
 {
		$this->hydrate($donnees);
 }
	
}
?>