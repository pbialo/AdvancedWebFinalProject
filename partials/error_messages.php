<?php
/*
	File Name: error_messages.php
	Author's name: Paul Bialo
	Web site name: Blogging Site
	File Description: 
*/  

$messages = get_messages();    
?>
<div id="error">
	<?php
		echo "<p>".htmlentities($messages)."</p>";
	?>
</div>
