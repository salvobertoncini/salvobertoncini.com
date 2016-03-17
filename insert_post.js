$(document).ready(function() {
  $("#Insert").click(function(){
  	event.preventDefault();
	var user = "1", titolo = $('#titolo').val(), articolo = CKEDITOR.instances['articolo'].getData();
	var id_immagine = $('#menuimmagini').val();
	alert(id_immagine);
    object = JSON.stringify({r: 'InsertPost', u: user, t: titolo, a: articolo, i:id_immagine});
	$.post("servo.php", { js_object: object }, 
		function(msg){
			console.log(msg);
			if(msg)
			{
				alert("Post inserito con successo!");
				location.reload();
			}
		});
  });
});
