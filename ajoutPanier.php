<?php
	session_start();
	
    if (isset($_SESSION['login']) && isset($_SESSION['pwd']))
	{
		
		$lectureBDD = json_decode(file_get_contents('BD.json'), true);

        $idCombi=$_GET['add'];
		$trouve=false;
		$inc=0; 
		for($inc;$inc<count($_SESSION['panier']['id']);$inc++) 
		{
            if ($_SESSION['panier']['id'][$inc] == $idCombi)
			{
                $trouve = true;

			}
			$inc +=1;
		}
		if ($trouve == false)
		{
			foreach($lectureBDD as $combinaison)
			{
				if ($idCombi == $combinaison['id'])
				{
					array_push( $_SESSION['panier']['id'],$combinaison['id']);
					array_push( $_SESSION['panier']['Nom'],$combinaison['Nom']);
					array_push( $_SESSION['panier']['Marque'],$combinaison['Marque']);
					array_push( $_SESSION['panier']['Prix'],$combinaison['Prix']);
					array_push( $_SESSION['panier']['Couleur'],$combinaison['Couleur']);
					array_push( $_SESSION['panier']['quantite'],1);
					

				}
			}

										
		}
		else 
		{

			//Si le produit existe déjà on ajoute seulement la quantité
			$positionProduit = array_search($idCombi,  $_SESSION['panier']['id']);
			$_SESSION['panier']['quantite'][$positionProduit] += 1 ;
		}		
		header('Location: Panier.php');
	
	}
	else 
	{
		header('Location: connexion.php');
		exit;
	}
?>