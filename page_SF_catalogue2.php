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
	<form id="formulaire" action="page_SF_catalogue3.php" method="get">
		<fieldset>
		    <legend>FICHE FORMATION </legend>
		    	<fieldset>
		   		 <legend>Description</legend>
					<label for="identifiant" >Identifiant :</label>
					<input id="identifiant" name="identifiant" type="text" value="" size="11" maxlength="32" />
				<br />
					<label for="intitule" >Intitul&eacute; :</label>
					<input id="intitule" name="intitule" type="text" value="" size="11" maxlength="32" />
				<br />
					<label for="datedeb" >Date de d&eacute;but :</label>
					<input id="datedeb" name="datedeb" type="text" value="AAAA-MM-JJ" size="11" onfocus="javascript:this.value=''" /> 
				<br />
					<label for="datefin" >Date de fin :</label>
					<input id="datefin" name="datefin" type="text" value="AAAA-MM-JJ" size="11" onfocus="javascript:this.value=''" />
				<br />
					<label for="description" >Description :</label>
					<input id="description" name="description" type="text" value="" size="11" maxlength="255" />
				<br />
				</fieldset>
				<fieldset>
				  <legend>Fonctions</legend>
					<label for="fonction">Fonction :</label>
					<select size ="1" name = "fonction" id = "fonction">
					<option value="NULL">Selectionner une fonction</option>

					<?php
						include 'connect.php';	
						$sql = "SELECT * FROM fonction"; 
						$result = mysql_query($sql)				
							or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
						$cpt=mysql_num_rows($result);
				
						if ($cpt>0) {	
							while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
								echo "<option value=$row[0]>$row[1]</option>";
							}					
						} else {
							echo "<select size=\"1\" name=\"numero\" id=\"numero\" disabled=\"disabled\" >";	
							echo "<option>Aucune information...</option>";
						}		
    				?>   
    				</select> 	
				<br />
				</fieldset>

				<fieldset>
				  <legend>Infos pratiques</legend>
					<label for="capacite" >Capacit&eacute; :</label>
					<input id="capacite" name="capacite" type="text" value="" size="11" maxlength="6" />
				<br />
					<label for="salle" >Salle :</label>
					<input id="salle" name="salle" type="text" value="" size="11" maxlength="32" />
				<br />
					<label for="adresse" >Adresse :</label>
					<input id="adresse" name="adresse" type="text" value="" size="11" maxlength="120" />
				<br />
					<label for="codepostal" >Code postal :&nbsp;&nbsp;</label>
					<input id="codepostal" name="codepostal" type="text" value="" size="11" maxlength="5" />
				<br />
					<label for="ville" >Ville :</label>
					<input id="ville" name="ville" type="text" value="" size="11" maxlength="60" />
				<br />
				</fieldset>
        </fieldset>

        <p>
			<input id="envoyer" name="envoyer" type="submit" value="Valider" title="" />
			<input  type="button"  name="btnannul" value="Annuler" onclick="self.location.href='page_SF_catalogue2.php'" />
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