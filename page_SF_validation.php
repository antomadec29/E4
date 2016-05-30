<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <title>FireRescue</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
		function refresh() {
			var e = document.getElementById("formation")
			var value = e.options[e.selectedIndex].value;
			document.location.href="page_SF_validation2.php?id_formation="+value;
		}
	</script>
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
	<form id="formulaire" action="#" method="post">
		<fieldset>
		    <legend>VALIDATION DES FORMATIONS </legend>
		    <label for="fORMATION">Formation :</label>
					<!-- r�cup�ration de FOR_ID de la table fonction pour la liste d�roulante -->
					<?php
						include 'connect.php';	
						$formationselect;
						$sql = "SELECT FOR_ID FROM formation"; 
						$result = mysql_query($sql)				
							or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
						$cpt=mysql_num_rows($result);
				
						if ($cpt>0) {
							echo "<select size=\"1\" name=\"formation\" id=\"formation\" onchange='refresh()'>";
							echo "<option value=\"#\" selected=\"selected\">Selectionner une formation</option>";
							while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
								
								echo "<option value=$row[0]>$row[0]</option>";
							}					
						} else {
							echo "<select size=\"1\" name=\"fonction\" id=\"fonction\" disabled=\"disabled\" >";	
							echo "<option>Aucune information...</option>";
						}		
						echo "</select>";
    				?>  
    				
    	</fieldset>

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