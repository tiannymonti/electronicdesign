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
	  <!--ESLAIDER-->
	  <link type="text/css" rel="stylesheet" href="noUiSlider.js/nouislider.css"/>
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
       
       <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>		
		</div>
	</nav>
	 <main>
		 <div class="row" style="margin-top: 0.2em">
		<div class="row" style="margin:auto;">
			<div class="input-field col s3">
				<label for="iniciod">Fecha inicio</label>			
				<input id="iniciod" type="text" class="start-datepicker" autocomplete="on">
			</div>
			<div class="input-field col s3">
				<label for="inicioh">Hora inicio</label>				
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
		<div id="connect" style="display:none; margin:auto; width:80%"></div>
		<div class="row" style="margin: auto;">
			<div class="col s4" style="display:none; margin:auto; text-align: center;" id = "values"><span class="flow-text"></span></div>
			<div class="col s4 push-s4" style="display:none; margin:auto; text-align: center;" id = "velous"><span class="flow-text"></span></div>
			<div class="col s4 pull-s4" style="display:none; margin:auto; text-align: center;" id = "velous2"><span class="flow-text"></span>0</div>
		</div>
		  <div class="preloader-wrapper big active" style="display:none; margin:auto;" id="preloader">
			<div class="spinner-layer spinner-blue-only">
			  <div class="circle-clipper left">
				<div class="circle"></div>
			  </div><div class="gap-patch">
				<div class="circle"></div>
			  </div><div class="circle-clipper right">
				<div class="circle"></div>
			  </div>
			</div>
		  </div>
		<div id="googleMap" style="width:95%;height:55em;margin:auto; margin-top:0.5em; display:none;"></div>
		</div>
	  </main>		  
      <footer name="abajo" class="page-footer light-blue darken-4" id="final">
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
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js" type="text/javascript"></script>
    <script async defer src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDIz0DiW7sx_Ra06WAb9dSm-QURV-WTZGM"></script>
	<script type="text/javascript" src="noUiSlider.js/nouislider.js"></script>
	<script type="text/javascript" src="wnumb.js/wNumb.js"></script>
        
    <script type="text/javascript">		 
		 var respuesta;
		 var map;
		 var myCenter;
		 var myCenter2;
		 var myPositions = [];
		 var myPositions2 = [];	
		 var marker;
		 var marker2;
		 var fecha1;
		 var fecha2;
		 var hora1;
		 var hora2;
		 var myPath;
		 var myPath2;
		 var myTimes = [];
		 var myTimes2 = [];
		 var losTiempos = [];
		 var slider;
		 var veloa = [];
		 var dista = [];
		
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
		
		slider = document.getElementById('connect');
		
		 noUiSlider.create(slider, {
		   start:  0,
		   connect: 'lower',
		   step: 1,
		   range: {
			 'min': 0,
			 'max': 1
		   },
		   format: wNumb({
			 decimals: 0
		   })
		 });	
		
		
	//GOOGLE MAPS	
		function initMap() {	
  
			map = new google.maps.Map(document.getElementById("googleMap"), {
			mapTypeId: google.maps.MapTypeId.ROADMAP
			}); 							
						
			  var symbolShape = {
				path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
				strokeColor: '#0000FF',
				strokeOpacity: 1.0
			  };
			  
			  var symbolDestination = {
				path: google.maps.SymbolPath.BACKWARD_OPEN_ARROW,
				strokeColor: '#0000FF',
				strokeOpacity: 1.0
			  };
			  
			  var symbolShapes = {
				path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
				strokeColor: '#FF0000',
				strokeOpacity: 1.0
			  };
			  
			  var symbolDestinations = {
				path: google.maps.SymbolPath.BACKWARD_OPEN_ARROW,
				strokeColor: '#FF0000',
				strokeOpacity: 1.0
			  };
			
			myPath = new google.maps.Polyline({
			path: myPositions,
			geodesic: true,
			strokeColor: '#0000FF',
			strokeOpacity: 1.0,
			strokeWeight: 3,
			icons: [{
					icon: symbolShape,
					offset: '0%'
				}, {
					icon: symbolDestination,
					offset: '100%'
					}],
			 });
			 
			myPath2 = new google.maps.Polyline({
			path: myPositions2,
			geodesic: true,
			strokeColor: '#FF0000',
			strokeOpacity: 1.0,
			strokeWeight: 3,
			icons: [{
					icon: symbolShapes,
					offset: '0%'
				}, {
					icon: symbolDestinations,
					offset: '100%'
					}],
			 });
			 
			myPath.setMap(map);
			myPath2.setMap(map);

				 
			 marker = new google.maps.Marker({
				  map: map,
				  position:myPositions[0],
				  icon: 'res/carnavicon.png'
			 });
			 marker2 = new google.maps.Marker({
				  map: map,
				  position:myPositions2[0],
				  icon: 'res/car2.png'
			 });
			 
	
			slider.noUiSlider.updateOptions({
				range: {
					'min': 0,
					'max': losTiempos.length - 1
				}
			});		

			
			var dateValues = document.getElementById('values');
			var rpmValues = document.getElementById('velous');
			var distValues = document.getElementById('velous2');
			//var otroValues = document.getElementById('velous2');
		 
			slider.noUiSlider.on('update', function( values, handle ) {
				dateValues.innerHTML = losTiempos[values[handle]];
				for (var i = 0; i < myTimes.length; i++) {
					if (myTimes[i] == losTiempos[values[handle]]){
							rpmValues.innerHTML = veloa[i] + "RPM";
							marker.setPosition(myPositions[i]);
							map.setCenter(marker.getPosition());
							map.setZoom(16);
							break;							
					}					
				}	
				for (var i = 0; i < myTimes2.length; i++) {
					if (myTimes2[i] == losTiempos[values[handle]]){
							distValues.innerHTML = dista[i] + "cm";
							marker2.setPosition(myPositions2[i]);
							map.setCenter(marker2.getPosition());
							map.setZoom(16);
							break;							
					}					
				}							
											
			});	
			
			 	 				 	 
			//var bounds = new google.maps.LatLngBounds(myPositions[0], myPositions[1]);
			
			//map.fitBounds(bounds);
			
			map.setCenter(myPositions[0]);
			
			map.setZoom(16);
			
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
			
			var fechaini = fecha1.concat(" ",hora1);
			var fechafin = fecha2.concat(" ", hora2);
			var momentoi = moment(fechaini);
			var momentof = moment(fechafin);
			var epochi = momentoi.valueOf().toString();
			var epochf = momentof.valueOf().toString();
			
		    var otrosparametros = {
                "fecha1" : fecha1,
                "hora1" : hora1,
				"fecha2" : fecha2,
                "hora2" : hora2                
			};
                     
            var parametros = {
                "epochi" : epochi,
                "epochf" : epochf,
			};
			
			//Dos ajaxxx
			$.when(
				$.ajax({ // First Request
					data:  parametros,
					url:   'dbhistoricosdos.php',
					type:  'post',
					beforeSend: function () {	
						myPositions = [];
						myTimes = [];
                        document.getElementById('preloader').style.display = 'block';
                        document.getElementById('googleMap').style.display = 'none';
                        document.getElementById('connect').style.display = 'none';
                        document.getElementById('values').style.display = 'none';
                        document.getElementById('velous').style.display = 'none';
                        document.getElementById('velous2').style.display = 'none';
					},
					success: function(response){ 
						document.getElementById('preloader').style.display = 'none';
						document.getElementById('googleMap').style.display = 'block';
						if (response == 0) {
							alert("Carro 1: No había datos con las condiciones establecidas");	
						};
						var arrayOfObjects = eval(response);						
						for (var i = 0; i < arrayOfObjects.length; i++) {
							var object = arrayOfObjects[i];
							for (var property in object) {
								myCenter = new google.maps.LatLng(object.kff1006, object.kff1005);	
								var a = parseInt(object.time);
								var d = moment.utc(a).local();								
								mytime = d.format("YYYY-MM-DD H:mm:ss");	
								var rpm = object.kc;
								veloa.push(rpm);  
								myPositions.push(myCenter);
								myTimes.push(mytime);
							}
						}    
							                  
					}           
				}),

				$.ajax({ //Seconds Request
					data:  otrosparametros,
					url:   'dbhistoricos.php',
					type:  'post', 
					beforeSend: function () {	
						myPositions2 = [];
						myTimes2 = [];
					},
					success: function(response){                          
						if (response == 0) {
							alert("Carro 2: No había datos con las condiciones establecidas");	
						};
						var arrayOfObjects = eval(response);						
						for (var i = 0; i < arrayOfObjects.length; i++) {
							var object = arrayOfObjects[i];
							for (var property in object) {
								myCenter2 = new google.maps.LatLng(object.latitud, object.longitud);	
								mytime = object.time;
								var distance = object.sensor;
								dista.push(distance); 
								myPositions2.push(myCenter2);
								myTimes2.push(mytime);
							}
						}     
					}           
				})

			).then(function() {
						document.getElementById('connect').style.display = 'block';	
						document.getElementById('values').style.display = 'block';
						document.getElementById('velous').style.display = 'block';	
                        document.getElementById('velous2').style.display = 'block';	
                        
                        losTiempos = myTimes.concat(myTimes2);
                        losTiempos.sort();
                        		
						initMap();
						
			});
					      
	  };  //end toggle	

   </script>
   
  </html>
