<?php

	__DIR__ . "/". include_once "model/post.php";
	__DIR__ . "/". include_once "controller/post_controller.php";

	function acquireGetParamethers()
	{
		return $_GET["id"];

	}

	$resp = getPostById(acquireGetParamethers());

	if($resp["response"])
	{
		$latestPost = $resp["latestPost"];
		
		echo "<h3>".$latestPost->getTitle()."</h3><h4><i>".$latestPost->getSubtitle()."</i></h4>";
		echo "<p><ba>Posted by <a href='about.php'>".$latestPost->getAuthor()."</a></ba></b>";
		if($latestPost->getImage() != "null")
			echo "<br><center><img class='img-responsive' src='contents/".$latestPost->getImage()."' ></center>";
		echo "<br><h4><span class=\"fa fa-calendar\" aria-hidden=\"true\"></span> ".date("l jS \of F Y", strtotime($latestPost->getDate()))."</h4>";
		echo "<p>".$latestPost->getText()."</p><div id=\"disqus_thread\"></div>
<script>

/**
 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
/*
var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
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
<noscript>Please enable JavaScript to view the <a href=\"https://disqus.com/?ref_noscript\">comments powered by Disqus.</a></noscript>";
	}
	else
		echo "WRONG WAY!";