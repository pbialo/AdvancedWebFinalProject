<?php
/*
	File Name: success_messages.php
	Author's name: Paul Bialo
	Web site name: Paul Bialo's Personal Portfolio
	File Description: 
*/  

$messages = get_messages();    
?>
<div id="successs">
	<?php
		echo "<p>".htmlentities($messages)."</p>";
	?>
</div>
