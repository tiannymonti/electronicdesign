<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	  <!--Icono y titulo de la pagina web-->
	  <link rel="icon" href="res/car-icon.png">
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <meta charset="UTF-8"> 
	  <title>Telemetria vehicular</title>
	  <!--Fuente del titulo-->
	  <link href="https://fonts.googleapis.com/css?family=Baloo+Paaji" rel="stylesheet"> 	  
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <nav style="background-color: #01579b;">
		<div class="nav-wrapper">
		<a href="#!" class="brand-logo"><i class="material-icons">room</i><span style="font-family: 'Baloo Paaji', cursive;">Encuentra tu carro</span></a>        
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="index.php">Ahora</a></li>
			<li class="active"><a href="hist.php">Historicos</a></li>
			<li><a href="#division">Fin</a></li>
		</ul>
		</div>
	</nav>
	 <main>
		 <div class="row" style="margin-top: 0.2em">
		 <form class="col s12">
		<div class="row">
			<div class="input-field col s3">
				<label for="iniciod">Fecha de inicio</label>			
				<input id="iniciod" type="text" class="start-datepicker">
			</div>
			<div class="input-field col s3">
				<label for="inicioh">Hora de inicio</label>				
				<input id="inicioh" type="text" class="start-timepicker">
			</div>
			<div class="input-field col s3">
				<label for="find">Fecha final</label>			
				<input id="find" type="text" class="end-datepicker">
			</div>
			<div class="input-field col s3">
				<label for="finh">Hora final</label>				
				<input id="finh" type="text" class="end-timepicker">
			</div>		
			  <button class="btn waves-effect waves-light light-blue darken-4" type="submit" name="action" onclick="toggleFunction()">Submit
				<i id="trigger" class="material-icons right">send</i>
			</button>	
		</div>
		</form>
		</div>
		<div class="row">
		<!--<div id="googleMap" style="width:95%;height:50em;margin:auto; margin-top:0.5em;"></div>-->
		<div class="divider"></div>
		<div class="col s12" id="division"><p> </p></div>
		</div>
	  </main>		  
      <footer name="abajo" class="page-footer light-blue darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Creado por:</h5>
               <ul>
                  <li><a class="grey-text text-lighten-4">Tatiana Barrios M.</a></li>
                  <li><a class="grey-text text-lighten-4">Loraine DAvila</a></li>
                  <li><a class="grey-text text-lighten-4">Luis Hernandez</a></li>
                  <li><a class="grey-text text-lighten-4">Rainer Romero D.</a></li>
                </ul>               
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Diseño Electrónico 2016-03</h5>
                <p class="grey-text text-lighten-4">Cliente: Ing Diego Gómez C.</p>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="http://uninorte.edu.co/">Universidad del Norte</a>
            </div>
          </div>
        </footer>       
    </body>
    
    <script type="text/javascript" src="pickadate.js/lib/picker.time.js"></script>
    <script type="text/javascript">
		 var $input1 = $('.start-datepicker').pickadate({
			today: '',
			monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 15, // Creates a dropdown of 15 years to control year
			clear: 'Clear selection',
			close: 'Cancel',
			onClose: function(){
				$(document.activeElement).blur()
			}			
		});
		var picker1 = $input1.pickadate('picker')
		
		var $tinput1 = $('.start-timepicker').pickatime({
			clear: 'Clear selection',
			close: 'Cancel',
			onClose: function(){
				$(document.activeElement).blur()
			}		
			})
		var pickert1 = $tinput1.pickatime('picker')
		
		 var $input2 = $('.end-datepicker').pickadate({
			today: '',
			monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 15, // Creates a dropdown of 15 years to control year
			clear: 'Clear selection',
			close: 'Cancel',
			onClose: function(){
				$(document.activeElement).blur()
			}			
		});
		var picker2 = $input2.pickadate('picker')
		
		var $tinput2 = $('.end-timepicker').pickatime({
			clear: 'Clear selection',
			close: 'Cancel',
			onClose: function(){
				$(document.activeElement).blur()
			}		
			})
		var pickert2 = $tinput2.pickatime('picker')
		
		 function toggleFunction() {
            picker1.open();
            pickert1.open();
            picker2.open();
            pickert2.open();
            var fecha1 = picker1.get('select', 'yyyy/mm/dd');
            var hora1 = pickert1.get('select', 'HH:i');
            var fecha2 = picker2.get('select', 'yyyy/mm/dd');
            var hora2 = pickert2.get('select', 'HH:i');
            var res1 = fecha1.split("/");
            var res2 = hora1.split(":");
            var res3 = fecha2.split("/");
            var res4 = hora2.split(":");  
            var parametros = {
						"yri" : res1[0],
						"mesi" : res1[1],
						"diai" : res1[2],
						"horai" : res2[0],
						"mini" : res2[1],
						"yrf" : res3[0],
						"mesf" : res3[1],
						"diaf" : res3[2],
						"horaf" : res4[0],
						"minf" : res4[1],
						
			};
            
            $.ajax({
                data:  parametros,
                url:   'dbhistoricos.php',
                type:  'post',
                beforeSend: function () {
                        $("#division").html("Procesando, espere por favor...");
                },
                success:  function (response) {
							alert("response");
							 window.location.href("dbhistoricos.php");
                }
			});         
        };
			
    </script>

   <!--<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDIz0DiW7sx_Ra06WAb9dSm-QURV-WTZGM"></script>-->

<!--
<script type="text/javascript">
var map;
var myCenter;
var marker;
var myVal = consulta();
var myPositions = [];
	function consulta(){
		
		$.ajax({
			url:"leebasededatos.php",
			success:
				function(response){
					//alert(response)
					var data=JSON.parse(response);
					document.getElementById("latitud").innerHTML = data.latitud;
					document.getElementById("longitud").innerHTML = data.longitud;
					document.getElementById("dia").innerHTML = data.dia;
					document.getElementById("mes").innerHTML = data.mes;
					document.getElementById("yr").innerHTML = data.yr;
					document.getElementById("hora").innerHTML = data.hora;
					document.getElementById("min").innerHTML = data.min;
					document.getElementById("seg").innerHTML = data.seg;

					myCenter = new google.maps.LatLng(data.latitud, data.longitud);	
					myPositions.push(myCenter);    				
				},
		});
		
		    var lineSymbol = {
				path: google.maps.SymbolPath.CIRCLE,
				fillOpacity: 1,
				scale: 3
			};
		
				  var myPath = new google.maps.Polyline({
					path: myPositions,
					geodesic: true,
					strokeColor: '#0000FF',
					strokeOpacity: 1.0,
					fillOpacity: 0,
					icons: [{
						icon: lineSymbol,
						offset: '0',
						repeat: '3px'
					}],
				});
 
  myPath.setMap(map);
		
	}
	
	var refresh = setInterval(function(){
		consulta();
		marker.setPosition(myCenter);
		map.panTo(myCenter);
		},3000);

function placeMarker(location) {
    marker = new google.maps.Marker({
    position: location,
    map: map,
  });
  var infowindow = new google.maps.InfoWindow({
    content: 'Latitude: ' + location.lat() +
    '<br>Longitude: ' + location.lng()
  });
  infowindow.open(map,marker);
}

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:15,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

  map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

marker=new google.maps.Marker({
  position:myCenter,
  icon: 'res/carnavicon.png'
  });

marker.setMap(map);
google.maps.event.addListener(map, 'click', function(event) {
   map.setZoom(9);
   map.setCenter(marker.getPosition());
  });
 

}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
-->
    
  </html>
