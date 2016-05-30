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
    include "connect.php";
    // Recupere le matricule du pompier (phase test)
    //$matricule = $_GET['matricule'];
    session_start();
    $matricule=$_SESSION['matricule'];
    //requete pour afficher le nom et le prenom
    $sqlNom = "SELECT sp_nom FROM pompier WHERE sp_matricule =".$matricule;
    $sqlPrenom = "SELECT sp_prenom FROM pompier WHERE sp_matricule =".$matricule;
    //on execute les requetes
    $resultNom = mysql_query($sqlNom);
    $resultPrenom = mysql_query($sqlPrenom);
    @$rowNom = mysql_fetch_array($resultNom, MYSQL_BOTH);
    @$rowPrenom = mysql_fetch_array($resultPrenom, MYSQL_BOTH);
    //on affiche les resultats
    echo "<fieldset style='width:650px;'>";
    echo $rowNom['0'];
    echo $rowPrenom['0'];
    echo "</fieldset><br/><br/>";

    //Requete SQL pour recuperer les informations � afficher
    $idForm = "SELECT formation.for_id,formation.for_libelle, formation.for_dte_debut, formation.for_dte_fin, formation.for_salle, formation.for_adresse, formation.for_cp, formation.for_ville FROM formation, inscrire WHERE formation.for_id = inscrire.for_id AND sp_matricule ='".$matricule."'";
    $resultidForm = mysql_query($idForm);

    // Si le pompier n'a aucune formation
    $row = mysql_fetch_array($resultidForm, MYSQL_BOTH);
    if($row==""){
	    echo " Vous n'etes inscrit à aucune formation ";
    }

    $idForm2 = "SELECT formation.for_id,formation.for_libelle, formation.for_dte_debut, formation.for_dte_fin, formation.for_salle, formation.for_adresse, formation.for_cp, formation.for_ville FROM formation, inscrire WHERE formation.for_id = inscrire.for_id AND sp_matricule ='".$matricule."'";
    $resultidForm2 = mysql_query($idForm2);

    // Affiche la ou les formations du pompier
    if($resultidForm2)
	    while($donnees = mysql_fetch_assoc($resultidForm2)){
	    echo "<fieldset style='width:650px;'>";
	    echo $donnees['for_id']." &nbsp;&nbsp;&nbsp;                  ";
	    echo $donnees['for_libelle'];
	    echo "<center>";
	    echo " du " .$donnees['for_dte_debut'];
	    if($donnees['for_dte_fin']=='0000-00-00'){
		    echo "";
	    } else {
	    echo "  au ".$donnees['for_dte_fin']."<br/>"; }
	    echo $donnees['for_salle']."<br/>";
	    echo $donnees['for_adresse'].",<br/>";
	    echo $donnees['for_cp']."&nbsp;&nbsp;";
	    echo $donnees['for_ville']." <br/>";
	    echo "</center>";
        echo "</fieldset>";
	    echo "<br/>";
	    echo "<br/>";
        }else
	    echo "fail";
    ?>

    <br /><br />
    <input id="effacer" type='reset' value='Annuler' name='Retour' onclick="self.location.href='page_SP_personnel.php'">
    <br /><br />
    </div>

    <div id="footer">
    <br />
    <p>&copy; Fire Rescue Squad 2006. All rights reserved. | designed by <a href="http://www.freewebsitetemplates.com">free website templates</a></p>
    </div>
    </div>
</body>
</html>