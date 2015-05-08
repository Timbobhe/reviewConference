<?php
class Invitation{

private $_message;
private $_article;
private $_membre;
private $_link;



public function __construct($message,$article,$membre,$link)
{
$this->_message=$message;
$this->_article=$article;
$this->_membre=$membre;	
}

public function setMessage($message)
{
	
	if(!is_string($message))
	{
	trigger_error('le message doit etre un string',E_USER_WARNING);
	return;
	}
	$this->_message=$message;
}

public function setArticle(Article $article)
{
$this->_article=$article;	
}

public function setMembre(MembreComite $membre)
{
$this->_membre=$membre;	
}


public function getMessage()
{
 return $this->_message;
}

public function getArticle()
{
return $this->_article	;
}

public function getMembre()
{
 return  $this->_membre;	
}

public function send(MembreComite $membre)
{
//fonction pour envoyer un mail a la membre	
}

protected function buildInvitation()
{
   
	
}

}
?>