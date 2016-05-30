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
    session_start();
    $matricule=$_SESSION['matricule'];
    $sql="Select sp_nom, sp_prenom from pompier where SP_Matricule=".$matricule;
    $result=mysql_query($sql);
    $rows=mysql_fetch_array($result, MYSQL_BOTH);

    echo $rows['0']." ".$rows['1'];
    echo "<hr />"
    ?>

    <br />

    <form id="formphp" action="page_SF_PF5.php" method="get">

	<input type="hidden" name='matricule' id ='matricule'>
    <table>
        <tr>
	        <td>
                <input type="radio" name='groupe1' id='Inscrire' value='inscrire'>
	            <label for="Inscrire"> Inscrire</label>
            </td>
        </tr>

        <tr>
	        <td>
                <input type="radio" name='groupe1' id='Suppr_Inscrire' value='suppr'>
	            <label for="Suppr_Inscrire"> Supprimer l'inscription</label>
            </td>
        </tr>
    </table>

    <br />

    <label for="Formation">Formation : </label>

    <?php
    include 'connect.php';
    $sql = "SELECT FOR_ID FROM formation";
    $result = mysql_query($sql)
    or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
    $cpt=mysql_num_rows($result);
				
    if ($cpt>0) {
        echo "<select size=\"1\" name=\"formation\" id=\"formation\">";
        while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
            echo "<option>$row[0]</option>";
        }
    } else {
        echo "<select size=\"1\" name=\"formation\" id=\"formation\" disabled=\"disabled\" >";
        echo "<option>Aucune information...</option>";
    }

    echo "</select>";
    ?>

    <br /> <br />
	<input id="envoyer" type='submit' value='Valider' name='Envoyer'>
	<input id="effacer" type='reset' value='Annuler' name='Effacer'>
    </form>

    <?php
    if (isset($_GET['message']))
        echo $_GET['message'];
    else
        echo "&nbsp;";
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