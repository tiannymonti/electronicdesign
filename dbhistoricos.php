<?php

	$yri = (int) $_POST['yri'];
	$mesi = (int) $_POST['mesi'];
	$diai = (int) $_POST['diai'];
	$horai = (int) $_POST['horai'];
	$mini = (int) $_POST['mini'];
	$yrf = (int) $_POST['yrf'];
	$mesf = (int) $_POST['mesf'];
	$diaf = (int) $_POST['diaf'];
	$horaf = (int) $_POST['horaf'];
	$minf = (int) $_POST['minf'];
	

    // Create connection
    $tion = mysqli_connect("localhost", "root", "1234", "coordenadas");
    // Check connection
    if ($tion->connect_error) {
        die("Connection failed: " . $tion->connect_error);
    } 

        // Consulta de selección 
    $querytime = mysqli_query($tion, "SELECT c.latitud, c.longitud, t.dia, t.mes, t.yr, t.hora, t.min, t.seg FROM coordenadas.cordenadas AS c JOIN coordenadas.time AS t ON c.id_cordenadas = t.id_time WHERE (t.yr = '.$yri.') AND (t.mes = '.$mesi.') AND (t.dia BETWEEN '.$diai.' AND '.$diaf.') ORDER BY c.id_cordenadas";);                             
    
    echo $querytime;
    
    // set array
	$positions = array();
	// look through query
	while($row = mysqli_fetch_assoc($querytime)){
		$positions[] = $row;
	}
	
	$location = array();
	$location = array_map('current', $positions);  
	
	echo json_encode($location);              
              
	$tion->close();
?>
