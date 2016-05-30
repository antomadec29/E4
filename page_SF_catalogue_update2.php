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
        <li class="nlink"><a href="page_cnxSF.php">Accueil</a></li>
        <li class="nlink"><a href="page_SF_personnel.php">Personnel</a></li>
        <li class="nlink"><a href="page_SF_catalogue.php">Catalogue</a></li>
        <li class="nlink"><a href="page_SF_validation.php">Validation</a></li>
    </ul>

    </div>

    <!-- Contenu de la page -->

    <div id="content">
    <br /><br />

    <?php
	include 'connect.php';

	// r�cup�ration des variables
	$identifiant=$_GET['identifiant'];
	$intitule=$_GET['intitule'];
	$datedeb=$_GET['datedeb'];
	$datefin=$_GET['datefin'];
	$description=$_GET['description'];
	$fonction=$_GET['fonction'];
	$capacite=$_GET['capacite'];
	$salle=$_GET['salle'];
	$adresse=$_GET['adresse'];
	$codepostal=$_GET['codepostal'];
	$ville=$_GET['ville'];
	
	// on enl�ve les espaces avant et apr�s chaque variable
	$identifiant=trim($identifiant);
	$intitule=trim($intitule);
	$datedeb=trim($datedeb);
	$datefin=trim($datefin);
	$description=trim($description);
	$capacite=trim($capacite);
	$salle=trim($salle);
	$adresse=trim($adresse);
	$codepostal=trim($codepostal);
	$ville=trim($ville);

		if (!empty($identifiant) && !empty($intitule) && !empty($datedeb) && !empty($datefin) && !empty($description) && !empty($salle) && !empty($adresse) && !empty($codepostal) && !empty($ville)) {
            //creation de la requete de modification
            $sql = "UPDATE `formation` SET `FCT_ID`='" . $fonction . "', `FOR_LIBELLE`='" . $intitule . "', `FOR_DTE_DEBUT`='" . $datedeb . "', `FOR_DTE_FIN`='" . $datefin . "',
		`FOR_CAPACITE`='" . $capacite . "', `FOR_SALLE`='" . $salle . "', `FOR_ADRESSE`='" . $adresse . "', `FOR_VILLE`='" . $ville . "', `FOR_CP`='" . $codepostal . "', `FOR_DESCRIPTION`='" . $description . "'
		WHERE `FOR_ID`='" . $identifiant . "'";

            //execution de la requete
            $result = mysql_query($sql);

            if ($result) {
                // affiche un message si $result fonctionne
                echo "<meta http-equiv='refresh' content='0;url=page_SF_catalogue.php?
			message=<font color=green>La modification a ete realisee</font>'>";
            } else {    //Affiche un message d'erreur si il manque l'info � saisir dans le formulaire
                echo "<meta http-equiv='refresh' content='0;url=page_SF_catalogue_update.php?
			message=<font color=red>Il manque une donnee dans le formulaire</font>'>";
            }
        }
    ?>
    <br /><br />
    </div>

    <div id="footer">
    <br />
    <p>&copy; Fire Rescue Squad 2006. All rights reserved. | designed by <a href="http://www.freewebsitetemplates.com">free website templates</a></p>
    </div>
    </div>
</body>
</html>
