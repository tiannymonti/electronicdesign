<?php
	
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
	$latitud = htmlspecialchars($_POST['latitud']);
	$longitud = htmlspecialchars($_POST['longitud']);
    // Create connection
    $tion = mysqli_connect("localhost", "root", "1234", "coordenadas");
    // Check connection
    if ($tion->connect_error) {
        die("Connection failed: " . $tion->connect_error);
    } 
    // Consulta de selección 
    $querypos = mysqli_query($tion, "SELECT time FROM cordenadas WHERE (FORMAT(latitud, 4) = FORMAT($latitud, 4)) AND (FORMAT(longitud, 4) = FORMAT($longitud, 4)) ORDER BY id_cordenadas;");
    if (!$querypos) {
		die('Consulta no válida: ' . mysql_error());
	}
	if (mysqli_num_rows($querypos) == 0) { 
		
		echo "0";
		//results are empty, do something here 
	} else { 
		//create an array
		$emparray = array();
		while($row =mysqli_fetch_assoc($querypos))
		{
			$emparray[] = $row;
		}
		echo json_encode($emparray);
    
    }  

    //close the db connection
    mysqli_close($tion);	              
                                          
    
?>
