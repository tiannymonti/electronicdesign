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
      <nav class ="light-blue darken-4" role="navigation">
		<div class="nav-wrapper container">
		<a id="logo-container" href="#!" class="brand-logo right"><span style="font-family: 'Baloo Paaji', cursive; font-size: 1em;">Encuentra tu carro</span></a>        
		<ul class="left hide-on-med-and-down">
			<li><a href="index.php">Ahora</a></li>
			<li class="active"><a href="flypaper.php">Historicos</a></li>
		</ul>
		
	   <ul id="nav-mobile" class="side-nav">
         <li><a href="index.php">Ahora</a></li>
		 <li class="active"><a href="flypaper.php">Historicos</a></li>
		 <li><a href="#final">Acerca de</a></li>
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
		<div id="connect" style="display:none; margin:auto;"></div>
		<div class="row" style="margin:auto;">
			<div id="values" style="display:none; margin:auto; text-align: center;"></div>
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
    <script async defer src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDIz0DiW7sx_Ra06WAb9dSm-QURV-WTZGM"></script>
	<script type="text/javascript" src="noUiSlider.js/nouislider.js"></script>
	<script type="text/javascript" src="wnumb.js/wNumb.js"></script>
        
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
		 var myPath;
		 var myTimes = [];
		
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

			var infowindow = new google.maps.InfoWindow();
			var i;
						
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
			 
			myPath.setMap(map);
			
					
			var slider = document.getElementById('connect');
			 noUiSlider.create(slider, {
			   start:  0,
			   connect: 'lower',
			   step: 1,
			   range: {
				 'min': 0,
				 'max': myTimes.length - 1
			   },
			   format: wNumb({
				 decimals: 0
			   })
			 });
			 
			 var dateValues = document.getElementById('values');
			 
			 marker = new google.maps.Marker({
				  map: map,
				  position:myPositions[0],
				  icon: 'res/carnavicon.png'
			 });
			 
			 slider.noUiSlider.on('update', function( values, handle ) {
				dateValues.innerHTML = myTimes[values[handle]];
				marker.setPosition(myPositions[values[handle]]);
				map.panTo(myPositions[values[handle]]);				
			});		 
			
			
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
						myPositions = [];
						myTimes = [];
                        document.getElementById('preloader').style.display = 'block';
                        document.getElementById('googleMap').style.display = 'none';
                        document.getElementById('connect').style.display = 'none';
                        document.getElementById('values').style.display = 'none';
                },
				success:					
					function(response){
						document.getElementById('preloader').style.display = 'none';
						document.getElementById('googleMap').style.display = 'block';
						if (response == 0) {
							alert("No había datos con las condiciones establecidas");
							return;	
						};
						var arrayOfObjects = eval(response);						
						for (var i = 0; i < arrayOfObjects.length; i++) {
							var object = arrayOfObjects[i];
							for (var property in object) {
								myCenter = new google.maps.LatLng(object.latitud, object.longitud);	
								mytime = object.time;
								myPositions.push(myCenter);
								myTimes.push(mytime);
							}
						}
						document.getElementById('connect').style.display = 'block';	
						document.getElementById('values').style.display = 'block';				
						initMap();				
					}  //fin de la funcion de response					
				}); //fin del ajax          
	  };  //end toggle	

   </script>
   
  </html>