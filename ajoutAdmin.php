<?php
	
	session_start();
	if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) 
	{
		if ($_SESSION['login'] == "admin" && $_SESSION['pwd'] == "admin")
		{
			$lectureBDD = json_decode(file_get_contents('BD.json'), true);
			$id = $_POST['id']; 
			$trouve = false; 
			foreach($lectureBDD as $combinaison)
			{ 
			
				if($combinaison['id'] == $id)
				{
					$trouve = true;
				}

			}
			
			if ($trouve != true)
			{ 			
				$id = $_POST['id'];
				$Nom = $_POST['Nom'];
				$Prix = $_POST['Prix'];
				$Marque = $_POST['Marque'];
				$Couleur = $_POST['Couleur'];
				$Description = $_POST['Description'];
				$Image = "ImageSource/".$id.".jpg";
				$array = Array(
								'id'=>$id,
								'Nom'=>$Nom,
								'Prix'=>$Prix,
								'Marque'=>$Marque,
								'Couleur'=>$Couleur,
								'Description'=>$Description,
								'Image'=>$Image
								);
				$lectureBDD[] = $array;
                move_uploaded_file($_FILES['Image']['tmp_name'],$array['Image']);
				file_put_contents('BD.json',json_encode($lectureBDD));
				header('Location: Accueil.php');
			}
            else
            {
                echo '<body onLoad="alert(\'Error, change l id\')">';
                echo '<meta http-equiv="refresh" content="0;URL=admin.php">';
            }
		
		}
		
	}	
?>