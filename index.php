<?php
/*
    File Name: index.php
    Author Name: Paul Bialo
    Web Site Name: Blogging Site
    File Description: Home page
*/
	include "functions/functions.php";
	include "partials/html_header.php";
?>
<body>
	<?php include 'partials/header.php'; ?>	
	<section>
		<div class="row">
			<?php 
				include 'partials/success_messages.php'; 
				include 'partials/error_messages.php';
			?>
			<!-- Only show blogs if logged in !-->
			<?php
				if (!logged_in()):
			?>
				<h2>Welcome</h2>
				<br>
				<p>Register and login to view blogs!</p>
			<?php
				else:
					include 'list_blogs.php';
				endif;	
			?>
	</section>
	<?php 
		include 'partials/footer.php'; 
		include "partials/js_loading.php"; 
	?>
</body>
</html>
