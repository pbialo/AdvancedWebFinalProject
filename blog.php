<?php
/*
    File Name: blog.php
    Author Name: Paul Bialo
    Web Site Name: Blogging Site
    File Description: Home page
*/
	include "functions/functions.php";
	include 'partials/get_login.php'; 
	include "partials/html_header.php";
	include 'partials/get_blog.php';
	$_SESSION['blog_id'] = $blog['id'];
?>
<body>
	<?php 
		include 'partials/header.php';
		include 'partials/error_messages.php';
	?>	
	<section>
		<div class="row">

			<h3><?php echo htmlentities($blog['blog_title'])?></h3>
			<div class="blog_subheading">
				<p>Submitted by <?php echo htmlentities(get_username($blog['username_id']))?> on <?php echo date('l\ F jS\,  Y (h:i:s A)',(int)$blog['blog_date']);?> </p>
			</div>
			<p><?php echo htmlentities($blog['blog_content'])?></p>
			<br>
			<h6>Comments</h6>
			<?php
				include 'list_comments.php'
			?>
			<?php
				if(check_comments_allowed($blog['id'])): ?>
					<br>
					<a href="post_comment.php?blog=<?php echo $blog['id'];?>" class="button">Post comment</a>
					<?php if(check_if_blog_author($blog['id'])): ?>
						<a href="disable_comments.php" class="button">Disable comments</a>
					<?php endif ?>

				<?php else: ?>
					<br>
					<p>Comments closed.</p>
				<?php endif ?>

		</div>
	</section>
	<?php 
		include 'partials/footer.php'; 
		include "partials/js_loading.php"; 
	?>
</body>
</html>
