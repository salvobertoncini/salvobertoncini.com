$(document).ready(function() {
  	event.preventDefault();
	object = JSON.stringify({r: 'InitializeWork'});
	$.post("servo.php", { js_object: object }, 
		function(response)
		{
			var obj = jQuery.parseJSON(response);
			$.each( obj, function( index ) {
				  $('#menuwork').append("<div class=\"col-lg-4 hover01\"><a class=\"zoom green\" href="+obj[index].link+"><figure><img class=\"img-responsive\" src="+obj[index].image+"/></figure></a><p>"+obj[index].title+"</p></div>")
				});
			
		}
	);
});


				
				