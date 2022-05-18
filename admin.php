<?php
	session_start();
?>
<html>
<body>
<?php



if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) 
    {
         if ($_SESSION['login'] == "admin" && $_SESSION['pwd'] == "admin")
            {
                echo ("
							
							<form method=POST action=ajoutAdmin.php enctype=multipart/form-data>
							<h1>Ajout</h1>
								<input id='id' type='text' placeholder='id' name=id required>
								<input id='Nom' type='text' placeholder='Nom' name=Nom required>
								<input id='Prix' type='number' placeholder='Prix en €' name=Prix required>
								<input id='Marque' type='text' placeholder='Marque' name=Marque required>
								<input id='Couleur' type='text' placeholder='Couleur' name=Couleur required>
								<input id='Description' type='text' placeholder='Description' name=Description required>
								<input id='Image' type= 'file' name=Image  accept= 'image/jpeg' required ><br />
								<br><br>
								<input id='submit' type='submit' value='Ajouter !'>
							</form>		
                    ");
            }
    }


       

?>
</body>
</html>
