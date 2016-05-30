<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>FireRescue</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
		function refresh() {
			var e = document.getElementById("caserne");
			var value = e.options[e.selectedIndex].value;
			document.location.href="page_CTA_personnel2.php?id_caserne="+value;
		}
	</script>
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
<?php
	//r�cup�ration des variables du formulaire
	$matricule=$_GET['matricule'] ;
	$nom=$_GET['nom'];
	$prenom=$_GET['prenom'];
	$dte_n=$_GET['dte_n'];
	$statut=$_GET['statut'];
	$grade=$_GET['grade'];
	$dte_o=$_GET['dte_o'];
	$r_alerte=$_GET['r_alerte'];
	$tel_f=$_GET['tel_f'];
	$tel_p=$_GET['tel_p'];
	if ($matricule=="") {
		echo "<meta http-equiv='refresh'content='0;url=formulaire.php?message=<font color=Red> Veuillez Inscrire votre Matricule !!! </font>'>";
	} else {
	//initialisation d'une variable
	$caserne_id="";
	
	//connection � la base de donn�e
	include 'connect.php';
	
	
	//transformation du grade en numero
	if ($grade=="Sapeur 1�re classe") {
		$grade_id=1;
	} else if ($grade=="Caporal"){
		$grade_id=2;
	} else if ($grade=="Caporal - Chef") {
		$grade_id=3;
	} else if ($grade=="Sergent") {
		$grade_id=4;
	} else if ($grade=="Sergent - Chef") {
		$grade_id=5;
	} else if ($grade=="Adjudant") {
		$grade_id=6;
	} else if ($grade=="Adjudant - Chef") {
		$grade_id=7;
	} else if ($grade=="Major") {
		$grade_id=8;
	} else if ($grade=="Lieutenant") {
		$grade_id=9;
	} else if ($grade=="Capitaine") {
		$grade_id=10;
	} else if ($grade=="Commandant") {
		$grade_id=11;
	} else if ($grade=="Lieutenant - Colonel") {
		$grade_id=12;
	} else {
		$grade_id=13;
	}
		
	//transformation du recepteur d'alerte(bip) en numero de caserne
	for($i=0;$i <2 ;$i++)    //2 est le nombre de caract�res
	{
		if ($i==1) {
			$caserne_id .= substr($r_alerte,4%(strlen($r_alerte)),1); // la premiere valeur est le 4�me chiffre du r�cepteur d'alerte
		} else {
			$caserne_id .= substr($r_alerte,5%(strlen($r_alerte)),1); // la premiere valeur est le 5�me chiffre du r�cepteur d'alerte
		}		
	}
	
	
	//requ�te SQL pour ajouter dans la base
	$test="Select * from pompier where SP_MATRICULE='".$matricule."'";
	$existe=mysql_query($test);
	$row=mysql_fetch_array($existe, MYSQL_BOTH);
	if ($row=="") {
		$sql2="Insert into `pompier`(`SP_MATRICULE`, `GRA_ID`, `CIS_ID`, `SP_NOM`, `SP_PRENOM`, `SP_DTE_NAISSANCE`, `SP_TEL_FIXE`, `SP_TEL_PORTABLE`, `SP_BIP`, `SP_STATUT`, `SP_DTE_MAJ`) 
			VALUES ('".$matricule."', '".$grade_id."', '".$caserne_id."', '".$nom."', '".$prenom."', '".$dte_n."', '".$tel_f."', '".$tel_p."', '".$r_alerte."', '".$statut."', '".$dte_o."')";
	
		$result = mysql_query($sql2);
		if ($result) {
			echo "<meta http-equiv='refresh'content='0;url=page_CTA_personnel_modifier.php?message=<font color=green> Insertion Réalisée </font>'>";
		} else {
			echo "<meta http-equiv='refresh'content='0;url=page_CTA_personnel_modifier.php?message=<font color=green> Insertion Echouée </font>'>";
		}
	} else {
		$sql="Update `pompier` Set `GRA_ID`='".$grade_id."',  
						`SP_NOM`='".$nom."', 
								`SP_PRENOM`='".$prenom."', 
										`SP_DTE_NAISSANCE`='".$dte_n."', 
												`SP_TEL_FIXE`='".$tel_f."', 
														`SP_TEL_PORTABLE`='".$tel_p."', 
																`SP_BIP`='".$r_alerte."', 
																		`SP_STATUT`='".$statut."', 
																				`SP_DTE_MAJ`='".$dte_o."' 
																						Where `SP_MATRICULE`='".$matricule."'";
		$resultat = mysql_query($sql);
		if ($resultat) {
			echo "<meta http-equiv='refresh'content='0;url=page_CTA_personnel.php?message=<font color=green> Modification Réalisée </font>'>";
		} else {
			echo "<meta http-equiv='refresh'content='0;url=page_CTA_personnel.php?message=<font color=green> Modification Echouée </font>'>";
		}
	}
	}
?>

  
</div>
  <div id="right">
    <div style="clear:both"></div>
   </div>
 	
  <div id="footer">
    <br />
   <p>&copy; Fire Rescue Squad 2006. All rights reserved. | designed by <a href="http://www.freewebsitetemplates.com">free website templates</a></p>
  </div>
</body>
</html>