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

<script type="text/javascript">
//var ar = new.Array();
var fecha1='2016-09-13';//formato --> 2016-09-16
var fecha2='2016-09-14';
var hora1='05:00:00';//formato --> 07:30:00
var hora2='05:30:00';//formato --> 15:30:00
var arraytime= new Array();	
var parametros = { "fecha1" : fecha1, "hora1" : hora1, "fecha2": fecha2, "hora2": hora2};
$.ajax({
    data:  parametros,
    url:   'dbhistoricos.php',
    type:  'post',
	success:					
		function(response){
			if (response == 0) {
				alert("No había datos con las condiciones establecidas");
				return;	
			};
			var arrayOfObjects = eval(response);
								
			for (var i = 0; i < arrayOfObjects.length; i++) {
				var object = arrayOfObjects[i];
				arraytime[i] = object['time'];	
			}	
		
		//-----sliderrrr------
		  $(function() {
            $( "#slider-1" ).slider({
              min:0,
              max:arraytime.length-1,
              step:1,
              orientation:"horizontal",
             slide: function( event, ui ) {
              select=arraytime[ui.value];

              $( "#minval" ).val(select);
              } 
             });
             $( "#minval" ).val( $( "#slider-1" ).slider( "value") );
             
             $( "#minval" ).val(arraytime[0]);
            }); 						
		}  //fin de la funcion de response	
	
	});
	

</script>
         <p>
            <label for="minval">fecha:</label>
            <input type="text" id="minval" 
               style="border:0; color:blue; font-weight:bold;">
         </p>
         <br>
         <div id="slider-1"></div>
    </body>
</html>
