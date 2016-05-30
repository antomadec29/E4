<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>FireRescue</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
  <br /><br /><br />
    	<form id="formphp" action="page_CTA_personnel2.php" method="get">
	<fieldset>
		<legend>Liste des personnels</legend>
		<label for="Caserne" >CIS :</label>
		<?php
				include 'connect.php';	
				$sql = "SELECT CIS_NOM FROM Caserne"; 
				$result = mysql_query($sql)		
					or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".mysql_error()."<br /><br /><b>REQUETE SQL : </b>$sql<br />");
				$cpt=mysql_num_rows($result);
				
				if ($cpt>0) {
					echo "<select size=\"1\" name=\"caserne\" id=\"caserne\" onchange='refresh()'>";
					echo "<option value=\"#\" selected=\"selected\">Selectionner une caserne</option>";
					while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
		
						echo "<option value=$row[0]>$row[0]</option>";
					}					
				} else {
					echo "<select size=\"1\" name=\"caserne\" id=\"caserne\" disabled=\"disabled\" >";	
					echo "<option>Aucune information...</option>";
				}
			
				echo "</select>";			   
    	?> 
    	
			
	</fieldset>
	<?php 
	if (isset($_GET['message']))
		echo $_GET['message'];
	else
		echo "&nbsp;";
	
	
	?>
</form>
		<br /><br /><br /><br /><br /><br /><br /><br />
  </div>
  <div id="right">
    <div style="clear:both"></div>
   </div>
 	
  <div id="footer">
    <br />
   <p>&copy; Fire Rescue Squad 2006. All rights reserved. | designed by <a href="http://www.freewebsitetemplates.com">free website templates</a></p>
  </div>
 </div>
</body>
</html>
