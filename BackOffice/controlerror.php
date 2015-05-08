<?php
@session_start();
					if(isset($_SESSION['erreur'])&&($_SESSION['erreur']=='oui')){
						$_SESSION['erreur']='non';
						if(isset($_SESSION['message'])){
							echo '<h4 class="alert_error">Erreur : '.$_SESSION['message'].'</h4>';
							$_SESSION['message']='';
						}
					}
					elseif(isset($_SESSION['saved'])&&($_SESSION['saved']=='oui')){
						echo '<h4 class="alert_success">Informations enregistrees!</h4>';
						$_SESSION['saved']='';
					}
?>
