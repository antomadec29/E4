<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>FireRescue</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
		function refresh() {
			var e = document.getElementById("caserne");
			var value = e.options[e.selectedIndex].value;
			document.location.href="page_CTA_personnel2.php?id_caserne="+value;
		}
	</script>
</head>
<body>
<div id="container">
<div id="logo"><img src="images/logo.jpg" alt="Logo" /></div>
<div id="banner"><img src="images/main-image.jpg" alt="Main Image" /></div>
<div id="nav">
    <ul>
      <li class="nlink"><a href="page_cnxCTA.php">Accueil</a></li>
      <li class="nlink"><a href="page_CTA_personnel.php">Personnel</a></li>     
    </ul>
 </div>
  <div id="content">
  <?php
  session_start();

  include "connect.php";
  $identifiant = $_GET['id'];
  $nom=$_SESSION['nom'];
  $prenom=$_SESSION['prenom'];

  $sql="SELECT SP_MATRICULE, SP_NOM, SP_PRENOM, SP_DTE_NAISSANCE, SP_STATUT, GRA_LIBELLE, SP_DTE_MAJ, SP_BIP, SP_TEL_FIXE, SP_TEL_PORTABLE FROM pompier, grade WHERE `SP_MATRICULE` = '".$identifiant."' and grade.GRA_ID=pompier.GRA_ID";
  $result=mysql_query($sql)
	  or die ("Error");
  $row=mysql_fetch_array($result, MYSQL_BOTH);
  ?>
<form id="formphp" action="page_CTA_personnel_modifier2.php" method="get">
	<fieldset>
		<legend>Personnels</legend>
		<table>
		<tr><td>
		<label for="matricule">Matricule :</label></td><td>
			<input type="text" name='matricule1' id='matricule1' disabled='true' value='<?php echo $row['0']; ?>'/></td>
            <input type="hidden" name="matricule" value="<?php echo $row['0']; ?>">
		</tr>
		<tr><td>
		<label for="nom" >Nom :</label></td><td>
			<input type="text" name='nom' id='nom' value='<?php echo $row['1'];?>'/></td></tr>
		<tr><td>
		<label for="prenom" >Prenom :</label></td><td>
			<input type="text" name='prenom' id='prenom' value='<?php echo $row['2'];?>'/></td></tr>
		<tr><td>
		<label for="dte_n" >Date de naissance :</label></td><td>
			<input type="text" name='dte_n' id='dte_n' value='<?php echo $row['3']; ?>'/></td></tr>
		<tr><td>
		<label for="statut" >Statut :</label></td><td>
		<select  name='statut' id='statut'>
			<option>Volontaire</option>
			<option>Professionnel</option>
		</select></td></tr>
		<tr><td>
		<label for="grade" >Grade :</label></td><td>
		<?php
				include 'connect.php';	
				$sql = "SELECT * FROM grade"; 
				$result = mysql_query($sql)		
					or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
				$cpt=mysql_num_rows($result);
				
				if ($cpt>0) {
					echo "<select size=\"1\" name=\"grade\" id=\"grade\">";	
					while ($row2 = mysql_fetch_array($result, MYSQL_BOTH)) {
						echo "<option value=$row2[0]>$row2[1]</option>";
					}					
				} else {
					echo "<select size=\"1\" name=\"grade\" id=\"grade\" disabled=\"disabled\" >";	
					echo "<option>Aucune information...</option>";
				}
			
				echo "</select>";			   
    	?>    		
		<br /></td></tr><tr><td>
		<label for="dte_o" >Date d'obtention :</label></td><td>
			<input type="text" name='dte_o' id='dte_o' value='<?php echo $row['6']; ?>'/></td></tr>
		<tr><td>
		<label for="r_alerte" >Recepteur d'alerte :</label></td><td>
			<input type="text" name='r_alerte' id='r_alerte' value='<?php echo $row['7']; ?>'/></td></tr>
		<tr><td>
		<label for="tel_f" >Telephone Fixe :</label></td><td>
			<input type="text" name='tel_f' id='tel_f' value='<?php echo $row['8']; ?>'/></td></tr>
		<tr><td>
		<label for="tel_p" >Telephone Portable :</label></td><td>
			<input type="text" name='tel_p' id='tel_p' value='<?php echo $row['9']; ?>'/></td></tr>
		<tr><td>
			
		<input id="envoyer" type='submit' value='Valider' name='Envoyer'/></td><td>
		<input type="button" name="Effacer" value="Annuler" onclick="self.location.href='page_CTA_personnel.php'">
		</table>
	</fieldset>
	<?php 
	if (isset($_GET['message']))
		echo $_GET['message'];
	else
		echo "&nbsp;";
	?>
</form>
</div>
  <div id="right">
    <div style="clear:both"></div>
   </div>
 	
  <div id="footer">
    <br />
   <p>&copy; Fire Rescue Squad 2006. All rights reserved. | designed by <a href="http://www.freewebsitetemplates.com">free website templates</a></p>
  </div>
</body>
</html>