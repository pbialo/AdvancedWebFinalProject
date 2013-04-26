<?php
/*
	File Name: list_comments.php
	Author Name: Paul Bialo
	Web Site Name: Blogging Stie
	File Description: Lists the comments for a blog post
*/

$comments = get_comments($blog['id']);

if (empty($comments)):
	echo '<br><p>No comments posted yet!</p>';
	die;
else:
	foreach ($comments as $comment): ?>
		<div class="comment">
			<?php echo htmlentities($comment['comment']);?>
		</div>
		<div class="comment_author_date">
			Submitted by <?php echo htmlentities(get_username($comment['username_id']))?> on <?php echo date('l\ F jS\,  Y (h:i:s A)',(int)$comment['comment_date']);?> </p>
		</div>
		<?php
	endforeach;
endif;