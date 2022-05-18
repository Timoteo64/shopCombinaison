<?php
		session_start ();

		$bdd = "tcouture001_pro";
		$host = "lakartxela.iutbayonne.univ-pau.fr";
		$user = "tcouture001_pro";
		$pass= "tcouture001_pro";
	$link=mysqli_connect($host,$user,$pass,$bdd) or die("Np");

	$log = $_POST['login'];	

	$select = mysqli_query($link, "SELECT * FROM users WHERE login = \"$log\"") or die ("No");

	if (isset($_POST['login']) && isset($_POST['pwd']))
	{	
		foreach($select as $tuple)
		{	
			if (($tuple['login'] == chop($_POST['login']," ")) && ($tuple['pwd'] == chop($_POST['pwd'], " "))) 
			{
				$_SESSION['login'] = $_POST['login'];
				$_SESSION['pwd'] = $_POST['pwd'];
				$_SESSION['mail'] = $tuple['mail'];
				{
					$_SESSION['panier']=array();
					$_SESSION['panier']['id'] = array();
					$_SESSION['panier']['Nom'] = array();
					$_SESSION['panier']['Marque'] = array();
					$_SESSION['panier']['Prix'] = array();
					$_SESSION['panier']['Couleur'] = array();
					$_SESSION['panier']['quantite'] = array();
					
				}
				header('location: Accueil.php');
			}
			
		}
		echo '<body onLoad="alert(\'Une erreur est survenue, le login ou le mot de passe est incorrect\')">';		
		echo '<meta http-equiv="refresh" content="0;URL=connexion.php">';	

	}
	else
	{
		echo '<body onLoad="alert(\'Nooooo:) \')">';
		echo '<meta http-equiv="refresh" content="0;URL=Accueil.php">';
	}
?>

