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
        if ($result = mysqli_query($tion, "SELECT time, kff1005, kff1006, kc FROM coordenadas.raw_logs ORDER BY idt DESC limit 1")) {                            
                    $reg = $result->fetch_assoc();
        }
echo json_encode($reg);
$tion->close();
?>
