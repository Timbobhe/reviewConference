<?php
session_start();

@$lang=$_GET['lang'];

//general
@$texte=$_POST["texte"];
@$fichier=$_FILES['fichier'];

	$file=fopen('../../FrontOffice/files/'.$lang.'ProgramDetails.txt','w');
	fputs($file,$texte);
	fclose($file);
	
	//Stockage du fichier	
		
		//Test si le fichier est bien uploadé
		if(isset($fichier)&&$fichier['error']==0){
			
			//Test si la taille du fichier est correcte
			if($fichier['size']<= 10000000){
				
				//Recuperer les informations sur l'extension
				$infosfichier=pathinfo($fichier['name']);
				$extension_upload=$infosfichier['extension'];
				$extensions_auth=array('pdf');
				
				//Verifier l'extention
				if(in_array($extension_upload,$extensions_auth)){
					
					//Validation et stockage du fichier
					move_uploaded_file($fichier['tmp_name'],'../../FrontOffice/files/'.$lang.'ConferenceProgram.pdf');
					
				}
				else{
					$_SESSION['erreur']='oui';
					$_SESSION['message']="L'extention du fichier n'est pas autorisée!";
					header("location:../toProgram.php");
					exit();
				}
			}
			else{
				$_SESSION['erreur']='oui';
				$_SESSION['message']='Fichier trop volumineux!';
				header("location:../toProgram.php");
				exit();
			}
		}
		else{
			$_SESSION['erreur']='oui';
			$_SESSION['message']='Erreur lors du telechargement du fichier!';
			header("location:../toProgram.php");
			exit();
		}
		
	
	$_SESSION['saved']='oui';
	header("location:../toProgram.php");

?>