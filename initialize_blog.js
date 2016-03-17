$(document).ready(function() {
  	event.preventDefault();
	object = JSON.stringify({r: 'InitializeBlog'});
	$.post("servo.php", { js_object: object }, 
		function(response)
		{	
			var obj = jQuery.parseJSON(response);

			$.each( obj, function( index ) {
					var temp = $("<div/>").html(obj[index].articles).text();
					var temp2 = $("<div/>").html(obj[index].title).text();
					$('#menublog').append("<p><img class=\"img-circle\" src=\"assets/img/user.png\" width=\"50px\" height=\"50px\"> <ba>Salvo Bertoncini</ba></p> <p><bd>Posted on "+obj[index].date+"</bd></p> <h4>"+temp2+"</h4> <p><img class=\"img-responsive\" src=\"show.php?id="+obj[index].idimmagine+"\"></p> "+temp+" <p><a href=\"article.php?id="+obj[index].id+"\">Comment / Continue Reading...</a></p><hr>");
				});
			
		}
	);
});
