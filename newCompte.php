<?php

	if(isset($_POST['mail']))
	{
	
		$mail = $_POST['mail'];
		$login = $_POST['login'];
		$pwd = $_POST['pwd'];

	
		$bdd = "tcouture001_pro";
		$host = "lakartxela.iutbayonne.univ-pau.fr";
		$user = "tcouture001_pro";
		$pass= "tcouture001_pro";

	
		$link=mysqli_connect($host,$user,$pass,$bdd) or die("Impossible de se connecter à la base de données");

		
		$verifLogin = mysqli_query($link, "SELECT login FROM users WHERE login = \"$login\"") or die ("Mort");

	
		$verifMail = mysqli_query($link, "SELECT mail FROM users WHERE mail = \"$mail\"") or die ("Mort");

	
		if(mysqli_num_rows($verifLogin))
		{
			
			echo '<body onLoad="alert(\'Ce nom d utilisateur existe déjà\')">';
			echo '<meta http-equiv="refresh" content="0;URL=inscription.php">';
		}
		
		elseif(mysqli_num_rows($verifMail)) 
		{
			
			echo '<body onLoad="alert(\'Cette adresse mail est deja associee a un compte\')">';
			echo '<meta http-equiv="refresh" content="0;URL=inscription.php">';
		}
	
		else
		{
			$link->query("INSERT INTO users VALUES ('$mail', '$login','$pwd')");
			header('location: connexion.php');
		}

		
		mysqli_close($link);

	}
	else
	{
		echo '<meta http-equiv="refresh" content="0;URL=Accueil.php">';
	}

?>