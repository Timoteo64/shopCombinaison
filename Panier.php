<?php
	session_start();



					
	if (isset($_SESSION['login']) && isset($_SESSION['pwd']))
	{
		$inc=0; 
		$Total=0;
		number_format($Total, 2, ',', ' ');
		for($inc;$inc<count($_SESSION['panier']['id']);$inc++) 
		{
			$Total+=($_SESSION['panier']['Prix'][$inc])*($_SESSION['panier']['quantite'][$inc]);
			echo $_SESSION['panier']['Nom'][$inc].'<BR>';
			echo $_SESSION['panier']['Marque'][$inc].'<BR>';
			echo $_SESSION['panier']['Prix'][$inc].'<BR>';
			echo $_SESSION['panier']['Couleur'][$inc].'<BR>';
			echo $_SESSION['panier']['quantite'][$inc].'<BR>';
			echo "<a href=ajoutPanier.php?add=".$_SESSION['panier']['id'][$inc].">Ajouter</a><BR>";
			echo "<a href=supprimerPanier.php?sup=".$_SESSION['panier']['id'][$inc].">Enlever</a><BR><BR>";


		}

		echo $Total;
		echo "<form action=paiement.php method=POST>
		<button class=boutonValidation name=validationPanier type=submit value=$Total> Paye </button>
		</form>";
		echo "<a href=Accueil.php>Retour accueil</a>.<BR>";   



	}
	else
	{
		header('Location: connexion.php');
		exit;
	}
?>