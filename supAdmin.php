<?php
	
	session_start();
	if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) 
	{
		if ($_SESSION['login'] == "admin" && $_SESSION['pwd'] == "admin")
		{
			$lectureBDD = json_decode(file_get_contents('BD.json'), true);
			$id = $_GET['sup']; 
            $inc=0; 
			foreach($lectureBDD as $combinaison)
			{ 
			
				if($id == $combinaison['id'])
                {
                    array_splice($lectureBDD,$inc,1);
                    @unlink("ImageSource/".$id.".jpg");
					@unlink("ImageRed/".$id.".jpeg");
                }
                $inc +=1;
              
            }
            file_put_contents('BD.json',json_encode($lectureBDD));
			header('location: Accueil.php');

        }

	}
?>