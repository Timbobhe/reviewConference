<?php

abstract class Utilisateur {
	
	protected $id;
	protected $nom;
	protected $prenom;
	protected $email;
	protected $cpostale;
	protected $tel;
	protected $pays;
	protected $nationalite;
	protected $institution;
	protected $laboratoire;
	protected $equipe;
	


	function getId(){
		
		return $this->id;
	}
	
	function setId($id){
		
		$this->id=$id;
	}

public function getNom(){
	return strtolower($this->nom);
}
public function setNom($nom){
	$this->nom=$nom;
}

public function getPrenom(){
	return strtolower($this->prenom);
}
public function setPrenom($prenom){
	$this->prenom=$prenom;
}

public function getEmail(){
	return  $this->email;
}
public function setEmail($email){
	$this->email=$email;
}

public function getCpostale(){
	return strtolower($this->cpostale);
}
public function setCpostale($cpostale){
	$this->cpostale=$cpostale;
}

public function getTel(){
	return strtolower($this->tel);
}
public function setTel($tel){
	$this->tel=$tel;
}

public function getPays(){
	return  strtolower($this->pays);
}
public function setPays($pays){
	$this->pays=$pays;
}

public function getInstitution(){
	return strtolower($this->institution);
}
public function setInstitution($institution){
	$this->institution=$institution;
}

public function getLaboratoire(){
	return strtolower($this->laboratoire);
}
public function setLaboratoire($laboratoire){
	$this->laboratoire=$laboratoire;
}

public function getEquipe(){
	return strtolower($this->equipe);
}
public function setEquipe($equipe){
	$this->equipe=$equipe;
}
public function getNationalite(){
	return strtolower($this->nationalite);
}
public function setNationalite($nationalite){
	$this->nationalite=$nationalite;
}

// hydradation
public function hydrate(array $donnees)
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


}

?>