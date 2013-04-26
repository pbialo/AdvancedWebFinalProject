<?php
/*
	File Name: error_messages.php
	Author name: Paul Bialo
	Web site name: Paul's Blogging Site
	File Description: Echos the latest error message
*/  

$messages = get_error_messages();    
?>
<div id="error">
	<?php
		echo "<p>".htmlentities($messages)."</p>";
	?>
</div>
