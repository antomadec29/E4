<?php

$ip=explode(".",$_SERVER['SERVER_ADDR']);

switch ($ip[0]) {
	case 127 :	
		//local
		$host = "127.0.0.1";
		$user = "root";
		$password = "";
		$dbname = "sdis29";
		break;
			
	default :
		exit ("Serveur non reconnu ...");
		break;
}

@$link = mysql_connect("127.0.0.1","root","")
or die ("Erreur SQL de <b>".$_SERVER["SCRIPT_NAME"]."</b>.<br />
			 Dans le fichier : ".__FILE__." a la ligne : ".__LINE__."<br />".
		mysql_error().
		"<br /><br />
		<b>REQUETE SQL : </b>$sql<br />");

@$connection=mysql_select_db("sdis29")
or die ("Impossible de se connecter : ".mysql_error());

?>