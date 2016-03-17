<!DOCTYPE html>
<html lang="en">
  <head>

  	<?php @include "head.html"; ?>

  </head>

  <body>

    <?php @include "navbar.html"; ?>

	<!-- +++++ Welcome Section +++++ -->
	<div id="ww">
	    <div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 centered">
					<img class="img-circle" src="assets/img/user.png" alt="Stanley">
					<h3>ABOUT SALVO!</h3>
					<hr>
					<p>Salvatore Bertoncini, born 1991, student of Computer Science at "Universit&agrave degli Studi di Messina".
					<br>
						I directed several projects developed in multiple languages with a variety of tools and frameworks 
						(e.g. HTML5, Bootstrap, PHP, AngularJS, JQuery, JS, Java, Python, C, C#, MySql, NoSql).
						I love Jazz music and drink enormous quantities of tea and coffee. 
						I play basketball since I was 12 years, and I am General Secretary of 
						<a href="http://www.messinagiovane.org">"Messina Giovane".</a>
					</p>
				</div><!-- /col-lg-8 -->
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /ww -->
	
	
	<!-- +++++ Information Section +++++ -->
	
	<div class="container pt">
		<div class="row mt centered">	
			<div class="col-lg-3">
				<span class="glyphicon glyphicon-cog"></span>
				<h4>Web Developement</h4>
				<p>Highly trained monkeys ensure the development of your applications, content to some bananas as a reward.</p>
			</div>
			
			<div class="col-lg-3">
				<span class="glyphicon glyphicon-thumbs-up"></span>
				<h4>Responsive Layout</h4>
				<p>Each application is designed and developed to be perfect on every type of device. Including your Commodore64.</p>
			</div>

			<div class="col-lg-3">
				<span class="glyphicon glyphicon-search"></span>
				<h4>Search Engine</h4>
				<p>The best result possible on every search engine, to be constantly on top. So, whoever seeks you, finds you. Always.</p>
			</div>

			<div class="col-lg-3">
				<span class="glyphicon glyphicon-star"></span>
				<h4>Friendly Support</h4>
				<p>At any time of day or night, if the phone rings, and you're "on the high seas", I will launch my lifesaver.</p>
			</div>
		</div><!-- /row -->
		
		<div class="row mt">
			<div class="col-lg-6">
				<h4>THE THINKING</h4>
				<p>
					Contrary to popular belief, source code is not simply random text.
				<br>
					Develop the best website can request self-denial, skills, knowledge of several programming languages and frameworks. 
					Thanks to my passion and my experience, I am able to find the best solution for your needs, with the latest technology.
				</p>
			</div><!-- /colg-lg-6 -->
			
			<div class="col-lg-6">
				<h4>THE SKILLS</h4>
				Java
				<div class="progress">
					<div class="progress-bar progress-bar-theme" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
						<span class="sr-only">60% Complete</span>
					</div>
				</div>

				JS / JQuery/ AngularJS
				<div class="progress">
					<div class="progress-bar progress-bar-theme" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">
						<span class="sr-only">80% Complete</span>
					</div>
				</div>
				
				HTML + CSS
				<div class="progress">
					<div class="progress-bar progress-bar-theme" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
						<span class="sr-only">90% Complete</span>
					</div>
				</div>
			</div><!-- /col-lg-6 -->
		</div><!-- /row -->
	</div><!-- /container -->
	
	<?php @include "footer.php"; ?>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
    <?php include_once("analyticstracking.php") ?>
  </body>
</html>
