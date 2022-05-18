<?php
	session_start();
?>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title>La combinaison</title>
   </head>
   <body>
<?php
echo"<a href=\"Panier.php\"><img src=\"ImageUtile/Panier.png\"></a>";

if (isset($_SESSION['login']) && isset($_SESSION['pwd']))
{
	   
	echo"<a href=\"deconnexion.php\"><img src=\"ImageUtile/Deconnexion.png\"></a>";

    if ($_SESSION['login'] == "admin" && $_SESSION['pwd'] == "admin")
    {
        $lectureBDD = json_decode(file_get_contents('BD.json'), true);
        $idCombi=$_POST["donneesCombi"];
        foreach($lectureBDD as $combinaison)
        {
            if ($combinaison['id'] == $idCombi)
            {
                echo "<a href=supAdmin.php?sup=".$combinaison['id'].">Supprimer article</a><BR>";   
            }
        }   
    }
}
else
{
	echo"<a href=\"connexion.php\"><img src=\"ImageUtile/Connexion.png\"></a>";	 
}		
$lectureBDD = json_decode(file_get_contents('BD.json'), true);

$idCombi=$_POST["donneesCombi"];
foreach($lectureBDD as $combinaison)
    {
         $imgRed='./ImageRed/'.$combinaison['id'].'.jpeg';
		if ($combinaison['id'] == $idCombi)
        {	echo "<img src=$imgRed><BR>";
            echo $combinaison['Nom']."<BR>";
            echo $combinaison['Marque']."<BR>";
            echo $combinaison['Prix']."<BR>";
            echo $combinaison['Couleur']."<BR>";
            echo $combinaison['Description']."<BR>";
            echo "<a href=ajoutPanier.php?add=".$combinaison['id'].">Ajouter au panier</a><BR>";      
        }
    }
?>
</body>
</html>