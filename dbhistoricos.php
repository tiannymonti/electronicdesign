<?php



    // Create connection
    $tion = mysqli_connect("localhost", "root", "1234", "coordenadas");
    // Check connection
    if ($tion->connect_error) {
        die("Connection failed: " . $tion->connect_error);
    } 

        // Consulta de selección 
        if ($result = mysqli_query($tion, "SELECT c.latitud, c.longitud, t.dia, t.mes, t.yr, t.hora, t.min, t.seg FROM coordenadas.cordenadas AS c JOIN coordenadas.time AS t ON c.id_cordenadas = t.id_time ORDER BY c.id_cordenadas DESC limit 1")) {                            
                    $reg = $result->fetch_assoc();
        }
echo json_encode($reg);
$tion->close();
?>
