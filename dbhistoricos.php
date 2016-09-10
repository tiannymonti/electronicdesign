<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
	$fecha1 = $_POST['fecha1'];
	$hora1 = $_POST['hora1'];
	$fecha2 = $_POST['fecha2'];
	$hora2 = $_POST['hora2'];
	
	$desde = htmlspecialchars($fecha1 . " " . $hora1);
	$hasta = htmlspecialchars($fecha2 . " " . $hora2);

    // Create connection
    $tion = mysqli_connect("localhost", "root", "1234", "coordenadas");
        
    // Consulta de selección 
    $querytime = mysqli_query($tion, "SELECT latitud, longitud FROM cordenadas WHERE time BETWEEN '$desde' AND '$hasta' ORDER BY time;");                             
    if (!$querytime) {
		die('Consulta no válida: ' . mysql_error());
	}
	
	//create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($querytime))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);

    //close the db connection
    mysqli_close($connection);
	
	//// look through query
	//while($row = mysqli_fetch_assoc($querytime)){
		//echo $row['latitud'];
		//echo $row['longitud'];
	//}	
              
?>
