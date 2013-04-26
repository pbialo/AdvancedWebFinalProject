<?php
/*
	File Name: success_messages.php
	Author's name: Paul Bialo
	Web site name: Paul's Blogging Site
	File Description: Echos the latest success message
*/  

$messages = get_success_messages();    
?>
<div id="success">
	<?php
		echo "<p>".htmlentities($messages)."</p>";
	?>
</div>
