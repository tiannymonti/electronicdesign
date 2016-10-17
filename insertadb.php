<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
	$timeb = $_POST['timer'];
	$idt = $_POST['idt'];
	
    // Create connection
    $tion = mysqli_connect("localhost", "root", "1234", "coordenadas");
    // Check connection
    if ($tion->connect_error) {
        die("Connection failed: " . $tion->connect_error);
    } 

	mysqli_query($link, "UPDATE raw_logs SET tiempob='$timeb' WHERE idt='$idt'");	
echo "Ha sido insertado correctamente"
$tion->close();
?>
