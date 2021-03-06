<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>FireRescue</title>
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

    <form id="formulaire" action="#" method="POST">

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

    <fieldset>
        <?php
        $formation=$_GET['id_formation'];
        $sql = "SELECT FOR_ID, FOR_LIBELLE, FOR_DTE_DEBUT, FOR_DTE_FIN FROM formation WHERE FOR_ID = '".$formation."'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result, MYSQL_BOTH);
        ?>

        <h1><?php echo $row[0]?> <?php echo $row[1]?> du <?php echo $row[2]?> au <?php echo $row[3]?></h1>

        <?php
        $sql = "SELECT FCT_LIBELLE FROM fonction, formation WHERE fonction.FCT_ID = formation.FCT_ID AND FOR_ID = '".$formation."'";
        $result = mysql_query($sql);
        $data = mysql_fetch_array($result, MYSQL_BOTH);
        ?>

        <p>Acc&egrave;s &agrave; la fonction <?php echo $data[0]?></p>
        <p>Personnels inscrits</p>

        <?php
        $sql = "SELECT pompier.SP_MATRICULE, SP_NOM, SP_PRENOM FROM pompier,inscrire,formation WHERE pompier.SP_MATRICULE = inscrire.SP_MATRICULE AND formation.FOR_ID = inscrire.FOR_ID AND formation.FOR_ID= '".$formation."'";
        $result = mysql_query($sql);
        $cpt=0;
        while ($row = mysql_fetch_array($result)) {
            // CSS pour une ligne sur deux
            $cpt++;
            if ($cpt%2==0)
                echo "<tr class=\"even\">";
            else
                echo "<tr class=\"odd\">";
            echo "<td width=\"15%\"><input type='checkbox' name='checkbox[]' id='checkbox' value='".$row['SP_MATRICULE']."'></td>";
            echo "<td width=\"15%\">".$row['SP_NOM']."</td>";
            echo "<td width=\"25%\">".$row['SP_PRENOM']."</td>";
            //<INPUT type="checkbox" name="checkbox" value="1">
            echo "<br />";
            echo "</tr>";
        }

        if($_POST)
        {
            include 'connect.php';
            $value = $_POST['checkbox'];
            $nbValide = sizeof($value);
            $id = $_GET['id_formation'];
            $sql = "SELECT FCT_ID FROM formation WHERE FOR_ID = '".$id."'";
            $result = mysql_query($sql);
            $fonction = mysql_fetch_array($result);

            for ($i = 0; $i < $nbValide; $i++)
            {
                $sql = "INSERT INTO EXERCER VALUES ('$value[$i]', '$fonction[0]')";
                $result = mysql_query($sql) ;
                if ($result){
                    echo "<br />Insertion réussie dans EXERCER";
                }
                Else{
                    echo "<br />Pompier déjà présent dans EXERCER";
                }

                $sql = "INSERT INTO VALIDE VALUES('$value[$i]', '$id')";
                $result = mysql_query($sql);
                if ($result){
                    echo "<br />Insertion réussie dans VALIDE";
                }
                Else{
                    echo "<br />Pompier déjà présent dans VALIDE";
                }
            }
        }
        ?>
    </fieldset>

    <p>
        <input type="submit" name="envoi_formation" value="Valider la formation" />
        <input  type="button"  name="btnannul" value="Annuler" onclick="self.location.href='page_SF_validation.php'" />
    </p>
    </form>
    <p>

    <?php
    if (isset($_GET['message']))
        echo $_GET['message'];
    else
        echo "&nbsp;";
    ?>

    </p>
    </form>

    </div>

    <div id="footer">
    <br />
    <p>&copy; Fire Rescue Squad 2006. All rights reserved. | designed by <a href="http://www.freewebsitetemplates.com">free website templates</a></p>
    </div>
    </div>
</body>
</html>