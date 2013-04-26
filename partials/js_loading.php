<?php
/*
    File Name: js_loading.php
    Author Name: Paul Bialo
	Web site name: Paul's Blogging Site
    File Description: JS scripts loaded throughout site. "Required" at bottom of page body.
*/  
	echo '
		<!-- JavaScript at the bottom for fast page loading -->

		<!-- Grab Google CDNs jQuery, with a protocol relative URL; fall back to local if offline -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script>window.jQuery || document.write("<script src="js/libs/jquery-1.7.1.min.js"><\/script>")</script>

		<!-- scripts concatenated and minified via build script -->
		<script src="js/plugins.js"></script>
		<script src="js/script.js"></script>
		<!-- end scripts -->

	'
;	