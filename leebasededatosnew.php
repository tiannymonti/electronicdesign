<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
    // Create connection
    $tion = mysqli_connect("localhost", "root", "1234", "coordenadas");
    // Check connection
    if ($tion->connect_error) {
        die("Connection failed: " . $tion->connect_error);
    } 

        // Consulta de selección 
        if ($result = mysqli_query($tion, "SELECT latitud, longitud, time, sensor FROM coordenadas.cordenadas ORDER BY id_cordenadas DESC limit 1")) {                            
                    $reg = $result->fetch_assoc();
        }
echo json_encode($reg);
$tion->close();
?>
