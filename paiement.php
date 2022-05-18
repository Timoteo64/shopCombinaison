<?php
	session_start();
	$prix = $_POST['validationPanier'];
	echo ("
		<form action=verificationPaiement.php method=POST>
			<div id=divPayement>
				<h7>Numéro de carte : </h7><input align='center' type=text id=saisieCarte name=codeCarte maxlength=16 minlength=16 pattern='[0-9]{16}' required>
			</div>
			<div id=divPayement2>
				<h7>Titulaire de la carte : </h7><input align='center' type=text id=saisieCarte name=nomCarte pattern='[A-Za-z ]*' required>
			</div>
			<div id=divPayement3>
				<h7>Date d'expiration : </h7><input align='center' type=month id=date name=dateJ required>
			</div>
			<div id=divPayement4>
				<h7>Cryptogramme : </h7><input align='center' type=text id=date name=crypto maxlength=3 minlength=3 pattern='[0-9]{3}' required>
			</div>
			<div id=divPayement5>
				<button id=boutonPayer>Valider</button><h7 style = 'margin-top:15px;margin-left:15px;'> Prix total : $prix €</h7>
			</div>
		</form>
		<a href=Accueil.php>Retour accueil</a>.<BR>   

	");

?>
