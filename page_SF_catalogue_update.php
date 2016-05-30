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
    $identifiant=$_GET['id'];
    ?>

    <form id="formulaire" action="page_SF_catalogue_update2.php" method="get">
			<fieldset>
				<legend>Description :</legend>
					<label for="identifiant">Identifiant :</label>
					<input id="identifiant" name="identifiant" type="text" value="<?php echo $identifiant; ?>"/><br />
					
					<label for="intitule">Intitul&eacute; :</label>

					<?php
                        $sql="SELECT FOR_LIBELLE FROM formation WHERE `FOR_ID` = '".$identifiant."'";
                        $recup = mysql_query($sql);
                        $result=mysql_result($recup, 0);
                    ?>

					<input id="intitule" name="intitule" type="text" value="<?php echo $result; ?>"/><br />
						
					<label for="datedeb">Date de debut :</label>

					<?php
                        $sql="SELECT FOR_DTE_DEBUT FROM formation WHERE `FOR_ID` = '".$identifiant."'";
                        $recup = mysql_query($sql);
                        $result=mysql_result($recup, 0);
                    ?>

					<input id="datedeb" name="datedeb" type="text" value="<?php echo $result; ?>"/><br />
					
					<label for="datefin">Date de fin :</label>

					<?php
                        $sql="SELECT FOR_DTE_FIN FROM formation WHERE `FOR_ID` = '".$identifiant."'";
                        $recup = mysql_query($sql);
                        $result=mysql_result($recup, 0);
                    ?>

					<input id="datefin" name="datefin" type="text" value="<?php echo $result; ?>"/><br />
					
					<label for="description">Description :</label>

					<?php
                        $sql="SELECT FOR_DESCRIPTION FROM formation WHERE `FOR_ID` = '".$identifiant."'";
                        $recup = mysql_query($sql);
                        $result=mysql_result($recup, 0);
                    ?>

					<input id="description" name="description" type="text" value="<?php echo $result; ?>"/><br />
			</fieldset>

			<fieldset>	
				<legend>Fonction :</legend>
				<select name="fonction">

                    <?php
                        $sql = "SELECT FCT_ID FROM formation WHERE `FOR_ID` = '".$identifiant."'";
                        $result = mysql_query($sql);
                        $id = mysql_fetch_array($result)[0]?>

                    <option value="NULL">Selectionner une fonction</option>

                    <?php
                    //On recupere les ID et LIBELLE des fonctions
                    $sql="SELECT FCT_ID,FCT_LIBELLE FROM fonction";
                    $resultat = mysql_query($sql);

                    //On fait tableau de donn�e avec $resultat
                    while ($donnees = mysql_fetch_array($resultat) ){ //Tant qu'il y a des r�sultat on rajoute une option dans le menu
                        ?>
                        <option value="<?php echo $donnees['FCT_ID']; ?>"<?=$donnees['FCT_ID'] == $id ? 'selected': ''?>><?php echo $donnees['FCT_LIBELLE']; ?></option>

                    <?php } ?>

			    </select>
			</fieldset>
			
			<fieldset>
				<legend>Infos pratique :</legend>
					<label for="capacite">Capacité :</label>

					<?php
                        $sql="SELECT FOR_CAPACITE FROM formation WHERE `FOR_ID` = '".$identifiant."'";
                        $recup = mysql_query($sql);
                        $result=mysql_result($recup, 0);
                    ?>

					<input id="capacite" name="capacite" type="text" value="<?php echo $result; ?>" /><br />
					
					<label for="salle">Salle :</label>

					<?php
                        $sql="SELECT FOR_SALLE FROM formation WHERE `FOR_ID` = '".$identifiant."'";
                        $recup = mysql_query($sql);
                        $result=mysql_result($recup, 0);
                    ?>

					<input id="salle" name="salle" type="text" value="<?php echo $result; ?>"/><br />
						
					<label for="adresse">Adresse :</label>

					<?php
                        $sql="SELECT FOR_ADRESSE FROM formation WHERE `FOR_ID` = '".$identifiant."'";
                        $recup = mysql_query($sql);
                        $result=mysql_result($recup, 0);
                    ?>

					<input id="adresse" name="adresse" type="text" value="<?php echo $result; ?>"/><br />
					
					<label for="codepostal">Code postal :</label>

					<?php
                        $sql="SELECT FOR_CP FROM formation WHERE `FOR_ID` = '".$identifiant."'";
                        $recup = mysql_query($sql);
                        $result=mysql_result($recup, 0);
                    ?>

					<input id="codepostal" name="codepostal" type="text" value="<?php echo $result; ?>"/><br />
					
					<label for="ville">Ville :</label>

					<?php
                        $sql="SELECT FOR_VILLE FROM formation WHERE `FOR_ID` = '".$identifiant."'";
                        $recup = mysql_query($sql);
                        $result=mysql_result($recup, 0);
                    ?>

					<input id="ville" name="ville" type="text" value="<?php echo $result; ?>"/><br />
			</fieldset>
			
			<input id="envoyer" name="envoyer" type="submit" value="Envoyer">
            <input id="reset" name="reset" type="reset" value="Annuler" onclick="self.location.href='page_SF_catalogue.php'">
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