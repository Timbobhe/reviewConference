<center>
<div style="width:900px">
<fieldset style="border:2px solid 	#008B8B;border-radius:8px;">
<legend><b style="color:#6A5ACD; font-size:24px;  "><?php echo OURCONTACT?></b></legend>

<table border="0" cellspacing="4">
<tr><td><b style="color:#4169E1"><?php echo ZIP;?></b></td><td><span style="color:#000000;"><?php echo $conf->getCodepostale(); ?></span></td></tr>
<tr><td><b style="color:#4169E1"><?php echo COUNTRY;?></td><td><span style="color:#000000;"><?php echo $conf->getPays(); ?></span></td></tr>
<tr><td><b style="color:#4169E1"><?php echo TEL;?></b></td><td><span style="color:#000000;"><?php echo $conf->getTel(); ?></span><td></td></tr>
<tr><td><b style="color:#4169E1"><?php echo FAX;?></b></td><td><span style="color:#000000;"><?php echo $conf->getFax(); ?></span></td></tr>
<tr><td><b style="color:#4169E1"><?php echo DIVERS;?></b></td><td><span style="color:#000000;"><?php echo $conf->getNom(); ?></span></td></tr>
<tr><td></td><td><span style="color:#000000;"><?php echo $conf->getDescription(); ?></span></td></tr>
<tr><td></td><td><span style="color:#000000;"><?php echo $conf->getDescription(); ?></span></td></tr>
<tr><td></td><td><span style="color:#000000;"><?php echo PLACE;?> : <?php echo $conf->getLieu(); ?></span></td></tr>
<tr><td></td><td><span style="color:#000000;"><?php echo DATE;?> : <?php echo $conf->getDate(); ?></span></td></tr>
</table>
</fieldset>
</div>
</center>