<?php
include_once("../../model/loadClassInstance.php");

$id = $_GET['idRev'] ;

RevisionDao::delete(new Revision(array('id'=>$id)));
header("location:../revision.php");

?>