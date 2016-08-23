<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	  <!--Icono y titulo de la pagina web-->
	  <link rel="icon" href="res/car-icon.png">
	  <meta charset="UTF-8"> 
	  <title>Telemetria vehicular</title>	  
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>         
	  <header>
		<img src="res/lasyrus.jpg" width="200" height="200">
		<h1> Sistema de telemetria de un vehiculo<h1>
	 </header>
	 <main>
		<div class="row">
		<div id="googleMap" style="width:100%;height:62.5em;"></div>
		<div class="divider"></div>
		<div class="col s4" id="division"><span class="flow-text">Tiempo: </span><span class="flow-text" id="eltiempo">23.08.2016 14:51</span></div>
		<div class="col s4 push-s4" id="division"><span class="flow-text">Latitud: </span><span class="flow-text" id="latitud">00000000</span></div>
		<div class="col s4 pull-s4" id="division"><span class="flow-text">Longitud: </span><span class="flow-text" id="longitud">00000000</span></div>
		</div>
	  </main>	
	  
        <footer class="page-footer light-blue darken-4">
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
    
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript">
	var map;
	var myCenter;
	var marker;
	var myVal = consulta();
	function consulta(){
		
			$.ajax({
				url:"leebasededatos.php",
				success:
					function(response){
						var data=JSON.parse(response);
						document.getElementById("eltiempo").innerHTML = data.tiempo;
						document.getElementById("latitud").innerHTML = data.latitud;
						document.getElementById("longitud").innerHTML = data.longitud;
						myCenter = new google.maps.LatLng(data.latitud,data.longitud);
					
					},
			});
		
	}
		var refresh = setInterval(function(){
			consulta();
			marker.setPosition(myCenter);
			map.panTo(myCenter);
			},10);

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

	function initialize(){
		var mapProp = { center:myCenter, zoom:15, mapTypeId:google.maps.MapTypeId.ROADMAP};

		map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

		marker=new google.maps.Marker({ position:myCenter,});

		marker.setMap(map);
		google.maps.event.addListener(map, 'click', function(event) {
		placeMarker(event.latLng);
		});
	}

	google.maps.event.addDomListener(window, 'load', initialize);

</script>
    
  </html>
