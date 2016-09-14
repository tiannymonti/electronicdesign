
<!DOCTYPE html>
  <html>

<head>
      <meta charset="utf-8">
      <title>jQuery UI Slider functionality</title>
      <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <!-- Javascript -->
    

   </head>


  <body>
  

  <?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
	
    // Create connection
    $tion = mysqli_connect("localhost", "roo1", "1234", "coordenadas");
    // Check connection
    if ($tion->connect_error) {
        die("Connection failed: " . $tion->connect_error);
    } 

        // Consulta de selección 
        $querytime = mysqli_query($tion, "SELECT time FROM cordenadas ORDER by id_cordenadas DESC LIMIT 10");

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
		//echo json_encode($emparray);
    
    } 
$tion->close();
?>

<script type="text/javascript">
var ar = <?php echo json_encode($emparray) ?>;

var contento = new Array();
var arrayOfObjects = eval(ar);
for (var i = 0; i < arrayOfObjects.length; i++) {
	var object = arrayOfObjects[i];
	var tiempo = object.time;	//esto es un string	
	contento[i] = tiempo;	
																
}
document.write(contento.length);


         
  //var array=["2016-09-13 05:01:11","2016-09-13 05:02:11","2016-09-13 05:03:11","2016-09-13 05:04:11"];
  cant=contento.length;
         $(function() {
            $( "#slider-5" ).slider({
              min:0,
              max:cant-1,
              step:1,
              value:[0],
              orientation:"horizontal",
             slide: function( event, ui ) {
              select=contento[ui.value];
              $( "#minval" ).val(select);
              } 
             });
             $( "#minval" ).val( $( "#slider-5" ).slider( "value") );
            });
      </script>
         <p>
            <label for="minval">Minumum value:</label>
            <input type="text" id="minval" 
               style="border:0; color:#b9cd6d; font-weight:bold;">
         </p>
         <div id="slider-5"></div>
    </body>
</html>