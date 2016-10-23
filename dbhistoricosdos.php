<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
	$epochi = intval($_POST['epochi']);
	$epochf = intval($_POST['epochf']);
	

    // Create connection
    $tion = mysqli_connect("localhost", "root", "1234", "coordenadas");
        
    // Consulta de selección 
    $querytime = mysqli_query($tion, "SELECT idt, time, kff1005, kff1006, kc FROM raw_logs WHERE CAST(time AS UNSIGNED) BETWEEN $epochi AND $epochf ORDER BY CAST(time AS UNSIGNED) ASC;");                             
    if (!$querytime) {
		die('Consulta no válida: ' . mysql_error());
	}
	if (mysqli_num_rows($querytime) == 0) { 
		
		echo "0";
		//results are empty, do something here 
	} else { 
		//create an array
		$emparray = array();
		while($row =mysqli_fetch_assoc($querytime))
		{
			$emparray[] = $row;
		}
		echo json_encode($emparray);
    
    }  

    //close the db connection
    mysqli_close($tion);	              
?>
