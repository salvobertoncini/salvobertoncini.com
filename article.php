<!DOCTYPE html>
<html lang="en">
  <head>
    <?php @include "head.html"; ?>
  </head>

  <body>

    <?php 

    	@include "navbar.html";
    	@include "config.php";


        // controlliamo che sia stato inviato un id numerico alla pagina
        if(isset($_GET['id'])&&(is_numeric($_GET['id']))){
          // valorizziamo la variabile relativa all'id dell'articolo e includiamo il file di configurazione
          $art_id = $_GET['id'];
          echo "<script>console.log('$art_id')</script>";

          // selezioniamo dalla tabella i dati relativi all'articolo
          $sql = "SELECT DISTINCT post.id, post.title, post.date, post.articles, post.id_image FROM `post` WHERE post.id = ".$art_id." ORDER BY post.id DESC"; 
          echo "<script>console.log('$sql')</script>";
          $result = mysql_query($sql);
          // se per quell'id esiste un articolo..

          while($row = mysql_fetch_assoc($result)){
            // ...estraiamo i dati e mostriamoli a video
            $art_id = $row['id'];
            $autore = "Salvo Bertoncini";
            $titolo = stripslashes($row['title']);
            $data = $row['date'];
            $articolo = html_entity_decode(stripslashes($row['articles']));
            $idimmagine = $row['id_image'];
        }
    }
    ?>

	
	<!-- +++++ Post +++++ -->
	<div id="white">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
          <br>
					<p><img src="assets/img/user.png" class="img-circle" width="50px" height="50px"> <ba><?php echo $autore; ?></ba></p>
					<p><bd><?php echo $data; ?></bd></p>
					<h4><?php echo $titolo; ?></h4>
					<p><img class="img-responsive" src='<?php echo "show.php?id=".$idimmagine; ?>'></p>
					<?php echo $articolo; ?>
					<br>
					<hr>
					<p><a href="blog.php"><- Back</a></p>
          <div id="disqus_thread"></div>
				</div>
      
			</div><!-- /row -->
      
	    </div> <!-- /container -->
	</div><!-- /white -->
	
	
	
<script>
/**
* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');

s.src = '//salvobertoncini.disqus.com/embed.js';

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
	
	<?php @include "footer.php"; ?>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script id="dsq-count-scr" src="//salvobertoncini.disqus.com/count.js" async></script>
    <?php include_once("analyticstracking.php") ?>
  </body>
</html>
