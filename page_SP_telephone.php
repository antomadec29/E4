<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>FireRescue</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container">
    <div id="logo"><img src="images/logo.jpg" alt="Logo" /></div>
    <div id="banner"><img src="images/main-image.jpg" alt="Main Image" /></div>
    <div id="nav">

    <!-- Menu -->

    <ul>
        <li class="nlink"><a href="page_cnxSP.php">Accueil</a></li>
        <li class="nlink"><a href="page_SP_personnel.php">Personnel</a></li>
        <li class="nlink"><a href="page_SP_formation.php">Formation</a></li>
        <!-- <li class="nlink"><a href="page_SP_organisation.php">Organisation</a></li> -->
    </ul>

    </div>

    <!-- Contenu de la page -->

    <div id="content">
    <br /><br />

    <?php
	include 'connect.php';
	
	session_start();
	$matricule=$_SESSION['matricule'];
	//@$matricule = $_GET['matricule'];	//Phase Test pour r�cup�rer un matricule
	
	if($matricule == ""){
		echo "<meta http-equiv='refresh' content='0;url=page_SP_personnel.php?
				message=<font color=red> Entrer un matricule !!! </font>'>";
	}

	//requete pour afficher le nom et le prenom
	$sqlNom = "SELECT sp_nom FROM pompier WHERE sp_matricule =".$matricule;
	$sqlPrenom = "SELECT sp_prenom FROM pompier WHERE sp_matricule =".$matricule;
	
	//on execute les requetes
	$resultNom = mysql_query($sqlNom);
	$resultPrenom = mysql_query($sqlPrenom);
	
	@$rowNom = mysql_fetch_array($resultNom, MYSQL_BOTH);
	@$rowPrenom = mysql_fetch_array($resultPrenom, MYSQL_BOTH);
	
	//on affiche les resultats
	echo $rowNom['0'];
	echo $rowPrenom['0'];
	?>
	
	<form id="formulaire" action="page_SP_telephone_2.php" method="get">

	<?php
	$sql = "SELECT SP_TEL_PORTABLE FROM pompier WHERE SP_MATRICULE = '".$matricule."'";		//Requete pour r�cup�rer le num telephone en fonction du matricule
	$result = mysql_query($sql);		//Execute la requete
	
	if($result){
		$row = mysql_fetch_array($result, MYSQL_BOTH);		//Si la requete fonctionne alors row recupere le resultat de ma ligne
		}
	?>

    <input id="matricule" name = "matricule" value="<?php echo $matricule; ?>" type="hidden">
	<label for="tel" >Téléphone : </label>
	<input id="tel" name="tel" type="text" value="<?php echo $row['0'];?>" size="20" maxlength="15">
			
	<?php
		if (isset($_GET['message']))
			echo $_GET['message'];
		else
			echo "&nbsp;";
				
	?>
				
    <p>
        <input id="valider" name="valider" type="submit" value="Valider" title="Valider" />
        <input id="effacer" name="effacer" type="reset" value="Annuler" title="" onclick="self.location.href='page_SP_personnel.php'"/>
    </p>
	    
    </form>
    <br /><br />
    </div>
 	
    <div id="footer">
    <br />
    <p>&copy; Fire Rescue Squad 2006. All rights reserved. | designed by <a href="http://www.freewebsitetemplates.com">free website templates</a></p>
    </div>
    </div>
</body>
</html>