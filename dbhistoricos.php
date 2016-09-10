<?php

	
	$fecha1 = $_POST['fecha1'];
	$hora1 = $_POST['hora1'];
	$fecha2 = $_POST['fecha2'];
	$hora2 = $_POST['hora2'];
	
	$desde = $fecha1 . " " . $hora1;
	$hasta = $fecha2 . " " . $hora2;
	echo $desde.' - '.$hasta;

    //// Create connection
    //$tion = mysqli_connect("localhost", "root", "1234", "coordenadas");
    //// Check connection
    //if ($tion->connect_error) {
        //die("Connection failed: " . $tion->connect_error);
    //} 

        //// Consulta de selección 
    //$querytime = mysqli_query($tion, "SELECT latitud, longitud, time FROM coordenadas.cordenadas WHERE (t.yr = '.$yri.') AND (t.mes = '.$mesi.') AND (t.dia BETWEEN '.$diai.' AND '.$diaf.') ORDER BY c.id_cordenadas";);                             
    
    //echo $querytime;
    
    //// set array
	//$positions = array();
	//// look through query
	//while($row = mysqli_fetch_assoc($querytime)){
		//$positions[] = $row;
	//}
	
	//$location = array();
	//$location = array_map('current', $positions);  
	
	//echo json_encode($location);              
              
?>
