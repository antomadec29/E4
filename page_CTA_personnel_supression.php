<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>FireRescue</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
<div id="logo"><img src="images/logo.jpg" alt="Logo" /></div>
<div id="banner"><img src="images/main-image.jpg" alt="Main Image" /></div>
<div id="nav">
<ul>
      <li class="nlink"><a href="page_cnxCTA.php">Accueil</a></li>
      <li class="nlink"><a href="page_CTA_personnel.php">Personnel</a></li>    
      </ul>
</div>
<div id="content">
<br /><br /><br />
<?php
	session_start();

	// on se connecte à la base de donnée
	include 'connect.php';

	// récupération des variables
	$nom=$_SESSION['nom'];
	$prenom=$_SESSION['prenom'];
	$caserne=$_SESSION['caserne'];

	//creation de la requete de modification
	$sql = "DELETE FROM `pompier` WHERE SP_NOM = '".$nom."' and SP_PRENOM='".$prenom."'";
	echo $sql;
		
	//execution de la requete
	$result = mysql_query($sql);
	if ($result){
		// affiche un message si $result fonctionne
		echo "<meta http-equiv='refresh' content='0;url=page_CTA_personnel3.php?
			message=<font color=green>La suppression à été réalisée</font>'>"; 
	}
	else {
		//Affiche un message d'erreur si il manque l'info à saisir dans le formulaire
		echo "<meta http-equiv='refresh' content='0;url=page_CTA_personnel3.php?
			message=<font color=red>Suppression pas possible</font>'>"; 
	}
?>
<br /><br /><br /><br /><br /><br /><br /><br />
</div>
<div id="right">
<div style="clear:both"></div>
</div>

<div id="footer">
<br />
<p>&copy; Fire Rescue Squad 2006. All rights reserved. | designed by <a href="http://www.freewebsitetemplates.com">free website templates</a></p>
</div>
</div>
</body>
</html>