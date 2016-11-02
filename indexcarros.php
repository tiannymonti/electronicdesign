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
      <script src="js/init.js"></script>
      
       <!--BARRA DE NAVEGACION -->
       <!-- Dropdown Structure -->
		<ul id="dropdown1" class="dropdown-content">
		  <li><a href="index.php">Carro 1</a></li>
		  <li class="divider"></li>
		  <li><a href="indexcarro2.php">Carro 2</a></li>
		  <li class="divider"></li>
		  <li><a href="indexcarros.php">Carro 1 & 2</a></li>
		</ul>
		
		<ul id="dropdown2" class="dropdown-content">
		  <li><a href="hist.php">Carro 1</a></li>
		  <li class="divider"></li>
		  <li><a href="hist2.php">Carro 2</a></li>
		  <li class="divider"></li>
		  <li><a href="histdoble.php">Carro 1 & 2</a></li>
		</ul>
      <nav class ="light-blue darken-4" role="navigation">
		<div class="nav-wrapper container">
		<a id="logo-container" href="#!" class="brand-logo right"><span style="font-family: 'Baloo Paaji', cursive; font-size: 1em;">Encuentra tu carro</span></a>        
		<ul class="left hide-on-med-and-down">
			<li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="dropdown1">Ahora<i class="material-icons right">arrow_drop_down</i></a></li>
			<li><a class="dropdown-button" data-beloworigin="true" href="#!" data-activates="dropdown2">Historicos<i class="material-icons right">arrow_drop_down</i></a></li>
		</ul>
		
	   <ul id="nav-mobile" class="side-nav">
         <li><a href="#"><strong>Ahora</strong></a></li>
         <li class="divider"></li>
		  <li><a href="index.php">Carro 1</a></li>		  
		  <li><a href="indexcarro2.php">Carro 2</a></li>
		  <li><a href="indexcarros.php">Carro 1 & 2</a></li>
		  <li class="divider"></li>
		 <li><a href="#"><strong>Historicos</strong></a></li>
		  <li class="divider"></li>
		  <li><a href="hist.php">Carro 1</a></li>
		  <li><a href="hist2.php">Carro 2</a></li>
		  <li><a href="histdoble.php">Carro 1 & 2</a></li>
		  <li class="divider"></li>
		 <li><a href="#division">Acerca de</a></li>
       </ul>
       
       <a href="#!" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>		
		</div>
	</nav>
	 <main>
		<div class="row">
		<div id="googleMap" style="width:95%;height:50em;margin:auto; margin-top:0.5em;"></div>
		<div class="divider"></div>
		</div>
		<div class="row">
		<div class="col s12" id="division"><span class="flow-text">Carro 1</span></div>
		</div>
		<div class="row">
		<div class="col s3" id="division"><span class="flow-text">Tiempo: </span><span class="flow-text" id="time">0000-00-00 00:00:00</span></div>
		<div class="col s3" id="division"><span class="flow-text">Latitud: </span><span class="flow-text" id="latitud">00000000</span></div>
		<div class="col s3 push-s3" id="division"><span class="flow-text">Longitud: </span><span class="flow-text" id="longitud">00000000</span></div>
		<div class="col s3 pull-s3" id="division"><span class="flow-text">RPM: </span><span class="flow-text" id="rpm">0</span></div>
		<div class="divider"></div>					
		</div>
		<div class="row">
		<div class="col s12" id="division"><span class="flow-text">Carro 2</span></div>
		</div>
		<div class="row">
		<div class="col s3" id="division"><span class="flow-text">Tiempo: </span><span class="flow-text" id="time2">0000-00-00 00:00:00</span></div>
		<div class="col s3" id="division"><span class="flow-text">Distancia: </span><span class="flow-text" id="sensor">0000</span><span class="flow-text">cm</span></div>		
		<div class="col s3 push-s3" id="division"><span class="flow-text">Latitud: </span><span class="flow-text" id="latitud2">00000000</span></div>
		<div class="col s3 pull-s3" id="division"><span class="flow-text">Longitud: </span><span class="flow-text" id="longitud2">00000000</span></div>
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
    
   <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
   <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDIz0DiW7sx_Ra06WAb9dSm-QURV-WTZGM"></script>

<script type="text/javascript">
var map;
var myCenter;
var myCenter2;
var marker;
var marker2;
var myVal = consulta();
var myPositions = [];
var myPositions2 = [];

	function CenterControl(controlDiv, map) {

	  // Set CSS for the control border.
	  var controlUI = document.createElement('div');
	  controlUI.style.backgroundColor = '#fff';
	  controlUI.style.border = '2px solid #fff';
	  controlUI.style.borderRadius = '3px';
	  controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
	  controlUI.style.cursor = 'pointer';
	  controlUI.style.marginBottom = '22px';
	  controlUI.style.textAlign = 'center';
	  controlUI.title = 'Click to recenter the map';
	  controlDiv.appendChild(controlUI);

	  // Set CSS for the control interior.
	  var controlText = document.createElement('div');
	  controlText.style.color = 'rgb(25,25,25)';
	  controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
	  controlText.style.fontSize = '16px';
	  controlText.style.lineHeight = '38px';
	  controlText.style.paddingLeft = '5px';
	  controlText.style.paddingRight = '5px';
	  controlText.innerHTML = 'Cambiar centro';
	  controlUI.appendChild(controlText);

	  // Setup the click event listeners: simply set the map...
	  controlUI.addEventListener('click', function() {
		var centro = map.getCenter()
		if (centro == myCenter) {
			map.setCenter(myCenter2);
		} else {
			map.setCenter(myCenter);	
		}		
	  });

	}

	function consulta(){
		
		$.ajax({
			url:"leedbcarro2.php",
			success:
				function(response){
					//alert(response)
					var data=JSON.parse(response);
					document.getElementById("latitud").innerHTML = data.kff1006;
					document.getElementById("longitud").innerHTML = data.kff1005;					
					document.getElementById("rpm").innerHTML = data.kc;	
					var a = parseInt(data.time);
					var d = moment.utc(a).local();
					var timer = d.format("YYYY-MM-DD H:mm:ss");
					document.getElementById("time").innerHTML = timer;
					myCenter = new google.maps.LatLng(data.kff1006, data.kff1005);	
					myPositions.push(myCenter);    				
					}				
		});
		
		$.ajax({
			url:"leebasededatosnew.php",
			success:
				function(response){
					//alert(response)
					var data=JSON.parse(response);
					document.getElementById("latitud2").innerHTML = data.latitud;
					document.getElementById("longitud2").innerHTML = data.longitud;
					document.getElementById("time2").innerHTML = data.time;
					document.getElementById("sensor").innerHTML = data.sensor;
					myCenter2 = new google.maps.LatLng(data.latitud, data.longitud);	
					myPositions2.push(myCenter2);    				
					}				
		});
				
		
		
			var lineSymbol = {
				path: 'M 0,-1 0,1',
				strokeOpacity: 1,
				scale: 4
			};
		
			  var myPath = new google.maps.Polyline({
				path: myPositions,
				geodesic: true,
				strokeColor: '#0000FF',
				strokeOpacity: 0,
				icons: [{
					icon: lineSymbol,
					offset: '0',
					repeat: '20px'
				}],
			});
			
			var myPath2 = new google.maps.Polyline({
				path: myPositions2,
				geodesic: true,
				strokeColor: '#FF0000',
				strokeOpacity: 0,
				icons: [{
					icon: lineSymbol,
					offset: '0',
					repeat: '20px'
				}],
			});
 
  myPath.setMap(map);
  myPath2.setMap(map);
		
	}
	
	var refresh = setInterval(function(){
		consulta();
		marker.setPosition(myCenter);
		marker2.setPosition(myCenter2);
		},3000);

function placeMarker(location, location2) {
   marker = new google.maps.Marker({
    position: location,
    map: map,
  });
   marker2 = new google.maps.Marker({
    position: location2,
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
  
 marker2=new google.maps.Marker({
  position:myCenter2,
  icon: 'res/car2.png'
  });

marker.setMap(map);
marker2.setMap(map);
google.maps.event.addListener(map, 'click', function(event) {
   map.setZoom(9);
   map.setCenter(marker.getPosition());
  });
  
    // Create the DIV to hold the control and call the CenterControl() constructor
  // passing in this DIV.
  var centerControlDiv = document.createElement('div');
  var centerControl = new CenterControl(centerControlDiv, map);

  centerControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
    
  </html>
