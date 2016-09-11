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
		<div class="row">
			<div class="input-field col s3">
				<label for="iniciod">Fecha de inicio</label>			
				<input id="iniciod" type="text" class="start-datepicker" autocomplete="on">
			</div>
			<div class="input-field col s3">
				<label for="inicioh">Hora de inicio</label>				
				<input id="inicioh" type="text" class="start-timepicker" autocomplete="off">
			</div>
			<div class="input-field col s3">
				<label for="find">Fecha final</label>			
				<input id="find" type="text" class="end-datepicker" autocomplete="on">
			</div>
			<div class="input-field col s3">
				<label for="finh">Hora final</label>				
				<input id="finh" type="text" class="end-timepicker" autocomplete="off">
			</div>		
			  <button class="btn waves-effect waves-light light-blue darken-4" type="submit" name="action" onclick="toggleFunction()">Aceptar
				<i id="trigger" class="material-icons right">send</i>
			</button>	
		</div>
		</div>
		<div class="row">
		<div id="googleMap" style="width:95%;height:50em;margin:auto; margin-top:0.5em;"></div>
		<div class="divider"></div>
		<div class="col s12"><h1 id="divisio"> HOLI </h1></div>
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
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDIz0DiW7sx_Ra06WAb9dSm-QURV-WTZGM"></script>
    
    <script type="text/javascript">		 
		 var respuesta;
		 var map;
		 var myCenter;
		 var myPositions = [];	
		 var marker;
		 var fecha1;
		 var fecha2;
		 var hora1;
		 var hora2;
		
		 var $input1 = $('.start-datepicker').pickadate({
			today: '',
			monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
			weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 15, // Creates a dropdown of 15 years to control year
			clear: 'Borrar',
			close: 'Cerrar',
			min: new Date(2016,0,01),
			max: true,
			onClose: function(){
				$(document.activeElement).blur()
			}			
		});
		var picker1 = $input1.pickadate('picker');
	      
  		var $tinput1 = $('.start-timepicker').pickatime({
			clear: 'Borrar',
			close: 'Cerrar',
			onClose: function(){
				$(document.activeElement).blur()
			}		
			});
		var pickert1 = $tinput1.pickatime('picker');
		
		var $input2 = $('.end-datepicker').pickadate({
			today: '',
			monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
			weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
			weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 15, // Creates a dropdown of 15 years to control year
			clear: 'Borrar',
			close: 'Cerrar',
			min: new Date(2016,0,01),
			max: true,
			onClose: function(){
				$(document.activeElement).blur()
			}			
		});
		var picker2 = $input2.pickadate('picker');
		if ( picker1.get('value') ) {
			picker2.set('min', picker1.get('select'))
		 };
		picker1.on('set', function(event) {
			if ( event.select ) {
				picker2.set('min', picker1.get('select'))
			}
		});         
		if ( picker2.get('value') ) {
			picker1.set('max', picker2.get('select'))
		};
		picker2.on('set', function(event) {
		if ( event.select ) {
			picker1.set('max', picker2.get('select'))
		}
		});
  	
		var $tinput2 = $('.end-timepicker').pickatime({
			clear: 'Borrar',
			close: 'Cerrar',
			onClose: function(){
				$(document.activeElement).blur()
			}		
			});
		var pickert2 = $tinput2.pickatime('picker');		
	//GOOGLE MAPS
		function initMap() {
			map = new google.maps.Map(document.getElementById("googleMap"), {
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}); 
		
			var lineSymbol = {
				path: 'M 0,-1 0,1',
				strokeOpacity: 1,
				scale: 4
			};
			var infowindow = new google.maps.InfoWindow();
			var i;
			
			for (var i = 0; i < myPositions.length; i++) {
				marker = new google.maps.Marker({
					map: map,
					position: myPositions[i],
				icon: 'res/carnavicon.png'
				});
				
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						map.setZoom(16); //aumenta el zoom
						map.setCenter(marker.getPosition());
						var latitud = marker.getPosition().lat();
						console.log(latitud);
						var longitud = marker.getPosition().lng();
						longitud = longitud.toFixed(4);
						console.log(longitud);
						var parametros = {
							"latitud" : latitud,
							"longitud" : longitud                
						};
						$.ajax({
							data:  parametros,
							url:   'leebasededatosmarker.php',
							type:  'post',
							 beforeSend: function () {
									infowindow.setContent("Cargando informacion");
									infowindow.open(map, marker);
							},
							success:
								function(response){
									console.log(response);
									infowindow.setContent(response);
									infowindow.open(map, marker);										
								}  //fin de la funcion de response					
							}); //fin del ajax 						
					}
				})(marker, i));
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

			myPath.setMap(map);
			
			var bounds = new google.maps.LatLngBounds(myPositions[0], myCenter);
			map.fitBounds(bounds);
			
		}; //end init map
					
	
		 function toggleFunction() {
            picker1.open();
            pickert1.open();
            picker2.open();
            pickert2.open();
            fecha1 = picker1.get('select', 'yyyy-mm-dd');
            if (fecha1 == null || fecha1 == "") {
				alert("Debe indicar fecha de inicio");
				return;
			};
            hora1 = pickert1.get('select', 'HH:i');
            if (hora1 == null || hora1 == "") {
				hora1 = "00:00";
			};
            hora1 = hora1.concat(":00");
            fecha2 = picker2.get('select', 'yyyy-mm-dd');
            if (fecha2 == null || fecha2 == "") {
				alert("Debe indicar fecha final");
				return;
			};           
            hora2 = pickert2.get('select', 'HH:i');
            if (hora2 == null || hora2 == "") {
				hora2 = "00:00";
			};
            hora2 = hora2.concat(":00"); 

            if (fecha1.localeCompare(fecha2) == 0){
				var tim1 = hora1.split(":");
				var tim2 = hora2.split(":");
				if (tim1[0] > tim2[0]){
					console.log("ENTRO");
					alert("Dias iguales, horas no posibles");
					return;
				}else if (tim1[0] == tim2[0]){
					if (tim1[1] > tim2[1]){
						alert("Dias iguales, horas no posibles");
						return;
					};
				};
			};
                     
            var parametros = {
                "fecha1" : fecha1,
                "hora1" : hora1,
				"fecha2" : fecha2,
                "hora2" : hora2                
			};
			$.ajax({
                data:  parametros,
                url:   'dbhistoricos.php',
                type:  'post',
                beforeSend: function () {
                        $("#divisio").html("Procesando, espere por favor...");
                },
				success:
					function(response){
						if (response == 0) {
							alert("No había datos con las condiciones establecidas");
							return;	
						};
						var arrayOfObjects = eval(response);						
						for (var i = 0; i < arrayOfObjects.length; i++) {
							var object = arrayOfObjects[i];
							for (var property in object) {
								myCenter = new google.maps.LatLng(object.latitud, object.longitud);	
								myPositions.push(myCenter);
							}
						}					
						initMap();				
					}  //fin de la funcion de response					
				}); //fin del ajax          
	  };  //end toggle	

   </script>
  </html>
