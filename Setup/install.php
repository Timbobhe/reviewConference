<?php
session_start();
$accept=$_POST['accepte'];
if(empty($accept) || $accept==0)
{
	header('Location:installation1.php');
    exit();
}
file_put_contents('../BackOffice/config/admin_config.txt',$_SESSION['login'].':'.md5($_SESSION['pass']));
file_put_contents('../BackOffice/config/init.txt',$_SESSION['host'].'|'.$_SESSION['username'].'|'.$_SESSION['passbdd'].'|'.$_SESSION['nombdd']);
session_destroy();
header('Location:../BackOffice/');