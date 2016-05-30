<?php

include "connect.php";

$login=$_GET['log'] ;
$mdp=$_GET['mdp'];

$sqlmatricule= "Select sp_matricule from login where log_login='".$login."' and log_mdp='".$mdp."'";
$resultmatricule = mysql_query($sqlmatricule);
$matricule=mysql_fetch_array($resultmatricule, MYSQL_BOTH);

session_start();

$_SESSION['matricule']=$matricule['0'];

$sql="Select `LOG_PROFIL` from `login` where LOG_LOGIN='$login' and LOG_MDP='$mdp'" ;

$result=mysql_query($sql) ;
if ($result) {
	$row=mysql_fetch_array($result, MYSQL_BOTH) ;

	if ($row['0']=="CTA")
		echo "<meta http-equiv='refresh'content='0;url=page_cnxCTA.php?message=<font color=green> Connection réussie </font>'>";
	else if ($row['0']=="SF")
		echo "<meta http-equiv='refresh'content='0;url=page_cnxSF.php?message=<font color=green> Connection réussie </font>'>";
	else if ($row['0']=="SP")
		echo "<meta http-equiv='refresh'content='0;url=page_cnxSP.php?message=<font color=green> Connection réussie </font>'>";
	else
		echo "<meta http-equiv='refresh'content='0;url=main_page.php?message=<font color=red> La connection a echoué </font>'>";

} else {
	echo "<meta http-equiv='refresh'content='0;url=main_page.php?message=<font color=red> La connection a echoué </font>'>";	
}
?>