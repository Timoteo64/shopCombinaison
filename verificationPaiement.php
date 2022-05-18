<?php
	session_start();
	$codeCarte = $_POST['codeCarte'];	
	$premierCarac = substr($codeCarte,1,1); 
	$dernierCarac = substr($codeCarte,-1);	
	$date= $_POST['dateJ'];
    if ($premierCarac != $dernierCarac){ 
		echo '<body onLoad="alert(\'Code de carte incorrect.\')">';
		echo '<meta http-equiv="refresh" content="0;URL=Panier.php">';
		exit;
    }
	else if ($date < date("Y-m",mktime(0,0,0,date("m")+3,date("d"),date("Y")))){
		echo '<body onLoad="alert(\'Date incorrect.\')">';
		echo '<meta http-equiv="refresh" content="0;URL=Panier.php">';
		exit;
	}
	else
	echo"Paiement validé"."<BR>";
	echo "<a href=Accueil.php>Retour accueil</a>.<BR>";   


?>