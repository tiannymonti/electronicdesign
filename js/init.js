(function($){
  $(function(){
	  
	
	$(".dropdown-button").dropdown({
		inDuration: 300,
		outDuration: 225,
		constrain_width: false, // Does not change width of dropdown to that of the activator
		hover: true, // Activate on hover
		gutter: 0, // Spacing from edge
		belowOrigin: true, // Displays dropdown below the button
		alignment: 'left' // Displays dropdown with edge aligned to the left of button		
	});
        
    $('.button-collapse').sideNav({
		edge: 'left', // Choose the horizontal origin
        closeOnClick: true // Closes side-nav on <a> clicks,
    });

  }); // end of document ready
})(jQuery); // end of jQuery name space
