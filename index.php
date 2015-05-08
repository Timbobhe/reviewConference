<?php
$cont=file_get_contents('BackOffice/config/admin_config.txt');
$cont2=file_get_contents('BackOffice/config/init.txt');
if(!strlen($cont) || !strlen($cont2))
header("location:Setup/installation1.php");
else
header("location:FrontOffice/");
?>