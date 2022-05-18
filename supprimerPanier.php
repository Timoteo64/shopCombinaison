<?php 

	session_start(); 
	$positionProduit = array_search($_GET['sup'],  $_SESSION['panier']['id']);
	if ($_SESSION['panier']['quantite'][$positionProduit] == 1)
	{
		//Nous allons passer par un panier temporaire
		$tmp=array();
		$tmp['id'] = array();
		$tmp['Nom'] = array();
		$tmp['Marque'] = array();
		$tmp['Prix'] = array();
		$tmp['Couleur'] = array();
		$tmp['quantite'] = array();
					

		for($inc = 0; $inc < count($_SESSION['panier']['id']); $inc++)
		{
			if ($_SESSION['panier']['id'][$inc] != $_GET['sup'])
			{
				array_push( $tmp['id'],$_SESSION['panier']['id'][$inc]);
				array_push( $tmp['Nom'],$_SESSION['panier']['Nom'][$inc]);
				array_push( $tmp['Marque'],$_SESSION['panier']['Marque'][$inc]);
				array_push( $tmp['Prix'],$_SESSION['panier']['Prix'][$inc]);
				array_push( $tmp['Couleur'],$_SESSION['panier']['Couleur'][$inc]);
				array_push( $tmp['quantite'],$_SESSION['panier']['quantite'][$inc]);
			}

		}
		//On remplace le panier en session par notre panier temporaire à jour
		$_SESSION['panier'] =  $tmp;
		//On efface notre panier temporaire
		unset($tmp);
		header('location: Panier.php');

	}
	else
	{
		$_SESSION['panier']['quantite'][$positionProduit] -= 1 ;
		header('location: Panier.php');
	}
?>