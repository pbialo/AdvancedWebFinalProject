<?php
/*
	File Name: messages.php
	Author's name: Paul Bialo
	Web site name: Paul Bialo's Personal Portfolio
	File Description: 
*/  

$messages = get_messages();    
?>
<div id="error">
	<?php
		echo "<p>".htmlentities($messages)."</p>";
	?>
</div>
