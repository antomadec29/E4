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
	<form id="formulaire" action="page_SF_catalogue2.php" method="get">
        <fieldset>
		    <legend>LISTE DES FORMATIONS</legend>

                <?php
				include 'connect.php';
	
				$sql = "SELECT `FOR_ID`, `FOR_DTE_DEBUT`FROM `formation`";
				$result = mysql_query($sql)

                or die("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
	
				echo "<table id=\"affichetableau\">";
				$cpt=0;
				while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
                    $cpt++;
 					echo "<td width=\"15%\">".$row[0]."</td>";
 					echo "<td width=\"60%\">".$row[1]."</td>";
 					echo "<td width=\"32\"> <a href=\"page_SF_catalogue_update.php?id=$row[0]\"><img src=\"edit.png\" title=\"Modifier...\" /></a></td>";
 					echo "<td width=\"32\"> <a href=\"page_SF_catalogue_supression.php?id=$row[0]\"><img src=\"delete.png\" title=\"Supprimer...\" /></a></td>";
 					echo "</tr>";
  					}		

  				echo "</tbody>
                </table>";
				?>

        </fieldset>
			<p>
				<input id="envoyer" name="envoyer" type="submit" value="Ajouter" title="" />
				<input  type="button"  name="btnannul" value="Annuler" onclick="self.location.href='page_SF_validation.php'" />
	    	</p>
			<p>

			<?php
			if (isset($_GET['message']))
    				echo $_GET['message'];
    			else
    				echo "&nbsp;";
    		?>

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
