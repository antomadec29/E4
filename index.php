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
      <li class="nlink"><a href="main_page.php">Accueil</a></li>
    </ul>
    
    </div>
    
    <!-- Contenu de la page -->
    
	<div id="content">
	<br /><br />
	
    <form id="formphp" action="CNX.php" method="get">    	
    	<table>
    	<tr>
    		<td>
				<label for="log">Login : </label>
			</td>
			<td>
				<input type="text" name='log' id='log'><br /><br />
			</td>
		</tr>
		
		<tr>
			<td>
				<label for="mdp" >Mot de passe : </label>
			</td>
			<td>
				<input type="password" name='mdp' id='mdp'>
			</td>
		</tr>
		
		<tr>
			<td>
				<input id="envoyer" type='submit' value='Valider' name='Envoyer'>
			</td>
		</tr>
		</table>
	</form>
	
	<br /><br />
		
	<!-- Footer -->
 	
	<div id="footer">
    <br />
    <p>&copy; Fire Rescue Squad 2006. All rights reserved. | designed by <a href="http://www.freewebsitetemplates.com">free website templates</a></p>
    </div>
    </div>
</body>
</html>