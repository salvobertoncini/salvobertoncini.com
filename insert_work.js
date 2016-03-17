$(document).ready(function() {
  $("#Insert").click(function(){
  	event.preventDefault();
	var titolo = $('#titolo').val(), link = $('#link').val(), articolo = CKEDITOR.instances['articolo'].getData(), id_immagine = $('#menuimmagini').val(), error = true, ajax;
    console.log("id_immagine: "+id_immagine);
    object = JSON.stringify({r: 'InsertWork', l: link, t: titolo, a: articolo, i:id_immagine});
	$.post("servo.php", { js_object: object }, 
		function(msg){
			console.log(msg);
			if(msg)
			{
				alert("Work inserito con successo!");
				location.reload();
			}
		});
  });
});