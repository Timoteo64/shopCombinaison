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

        echo "<a href=admin.php>Ajouter article</a>.<BR>";   

    }
}
else
{
	echo"<a href=\"connexion.php\"><img src=\"ImageUtile/Connexion.png\"></a>";
    	 
}		
function redimage($img_src,$img_dest,$dst_w,$dst_h){

    //Lecture des dimensions de l'image
    $size=getImageSize("$img_src");
    $src_w=$size[0];
    $src_h=$size[1];

    //Teste les dimensions tenant dans la zone
    $test_h=round(($dst_w/$src_w)*$src_h);
    $test_w=round(($dst_h/$src_h)*$src_w);

    //Crée une image vierge aux bonne dimensions
    $dst_im=ImageCreateTrueColor($dst_w,$dst_h);

    //Copie dans l'image initiale redimensionné
    $src_im=ImageCreateFromJpeg("$img_src");
    ImageCopyResampled($dst_im,$src_im,0,0,0,0,$dst_w,$dst_h,$src_w,$src_h);

    //Sauvegarde de la nouvelle image
    ImageJpeg($dst_im,$img_dest);

    //Detruis les tampons
    ImageDestroy($dst_im);
    ImageDestroy($src_im);
}
$lectureBDD = json_decode(file_get_contents('BD.json'), true);
foreach($lectureBDD as $combinaison)
	{
		redimage($combinaison['Image'],$combinaison['Image'],148,183);
		$imgRed='./ImageRed/'.$combinaison['id'].'.jpeg';
		redimage($combinaison['Image'],$imgRed,250,308);
		echo
		"
			<form action=Article.php method=POST>
					<button type=submit name=donneesCombi value='$combinaison[id]'>
				
					
					<img src=$combinaison[Image]>
					<h3> $combinaison[Nom]</h3>
					<h4> $combinaison[Marque]</h4>
					<h5> $combinaison[Prix]</h5>	

					
					</button>
			</form>";
	}

 ?>

   </body>
</html>

