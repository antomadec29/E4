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
        <!--  <li class="nlink"><a href="page_SF_organisation.php">Organisation</a></li> -->
    </ul>

    </div>

    <!-- Contenu de la page -->

    <div id="content">
    <br /><br />

    <?php
    include "connect.php";

    session_start();
    $matricule=$_SESSION['matricule'];
    // Recupere le matricule du pompier (phase test)
    //$matricule = $_GET['matricule'];

    //requete pour recuperer le nom et le prenom
    $sqlNom = "SELECT sp_nom FROM pompier WHERE sp_matricule =".$matricule;
    $sqlPrenom = "SELECT sp_prenom FROM pompier WHERE sp_matricule =".$matricule;
    $sqlMatricule = "SELECT sp_matricule FROM pompier WHERE sp_matricule=".$matricule;
    $sqlCaserne = "SELECT cis_nom FROM caserne, pompier WHERE caserne.cis_id = pompier.cis_id AND sp_matricule = ".$matricule;
    $sqlStatut = "SELECT sp_statut FROM pompier WHERE sp_matricule =".$matricule;
    $sqlGrade = "SELECT gra_libelle FROM grade, pompier WHERE grade.gra_id = pompier.gra_id AND sp_matricule =".$matricule;
    $sqlObtGrade = "SELECT sp_dte_maj FROM pompier WHERE sp_matricule =".$matricule;
    $sqlBIP = "SELECT sp_bip FROM pompier WHERE sp_matricule=".$matricule;
    $sqlFonction = "SELECT fonction.fct_id FROM fonction, exercer WHERE fonction.fct_id = exercer.fct_id AND sp_matricule=".$matricule;
    $sqlAge = "SELECT (year(current_date) - year (sp_dte_naissance)) FROM pompier where sp_matricule =".$matricule;

    //on execute les requetes
    $resultNom = mysql_query($sqlNom);
    $resultPrenom = mysql_query($sqlPrenom);
    $resultMatricule = mysql_query($sqlMatricule);
    $resultCaserne = mysql_query($sqlCaserne);
    $resultStatut = mysql_query($sqlStatut);
    $resultGrade = mysql_query($sqlGrade);
    $resultObtGrade = mysql_query($sqlObtGrade);
    $resultBIP = mysql_query($sqlBIP);
    $resultFonction = mysql_query($sqlFonction);
    $resultAge = mysql_query($sqlAge);

    @$rowNom = mysql_fetch_array($resultNom, MYSQL_BOTH);
    @$rowPrenom = mysql_fetch_array($resultPrenom, MYSQL_BOTH);
    @$rowMatricule = mysql_fetch_array($resultMatricule, MYSQL_BOTH);
    @$rowCaserne = mysql_fetch_array($resultCaserne, MYSQL_BOTH);
    @$rowStatut = mysql_fetch_array($resultStatut, MYSQL_BOTH);
    @$rowGrade = mysql_fetch_array($resultGrade, MYSQL_BOTH);
    @$rowObtGrade = mysql_fetch_array($resultObtGrade, MYSQL_BOTH);
    @$rowBIP = mysql_fetch_array($resultBIP, MYSQL_BOTH);
    @$rowFonction = mysql_fetch_array($resultFonction, MYSQL_BOTH);
    @$rowAge = mysql_fetch_array($resultAge, MYSQL_BOTH);

    //on affiche les resultats

    echo "<fieldset style='width:750px;'>";
	    echo $rowNom['0']." ";
	    echo $rowPrenom['0'];
    echo "</fieldset><br/><br/>";
    echo "<table border = 0>";
    echo "<tr>";
	    echo "<td> Matricule : ".$rowMatricule['0']."</td>";
    echo "</tr>";
    echo "<tr>";
	    echo "<td>".$rowCaserne['0']."</td>";
    echo "</tr>";
    echo "<tr>";
	    echo "<td>".$rowAge['0']." ans"."</td>";
    echo "</tr>";
    echo "<tr>";
    	echo "<td>"."Statut et grade : "."</td>";
    echo "</tr>";
    echo "<tr>";
	    echo "<td border = 1>".$rowStatut['0']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</td>";
	    echo "<td border = 1>".$rowGrade['0']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</td>";
	    echo "<td border = 1>".$rowObtGrade['0']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."</td>";
    echo "</tr>";
    echo "<tr>";
	    echo "<td>"."Récepteur d'alerte : "."</td>";
	    echo "<td>".$rowBIP['0']."</td>";
    echo "</tr>";
    echo "<tr>";
	    echo "<td>".$rowFonction['0']."</td>";
    echo "</tr>";
    echo "</table>";

    if ($rowFonction == ""){
    	echo "Vous n'avez aucune fonction...";
    }
    ?>

    <form method="link" action="page_SF_telephone.php"> <input type="submit" value="Téléphones" /></form>
    <form method="link" action="page_SF_formation.php"> <input type="submit" value="Formations" /></form>
    <!-- <form method ="link" action="affiche_liste_organisation.php"> <input type="submit" value="Organisations" /></form> -->
    <br /><br />
    </div>

    <div id="footer">
    <br />
    <p>&copy; Fire Rescue Squad 2006. All rights reserved. | designed by <a href="http://www.freewebsitetemplates.com">free website templates</a></p>
    </div>
    </div>
</body>
</html>