<?php
/*
    File Name: list_blogs.php
    Author Name: Paul Bialo
    Web Site Name: Blogging Site
    File Description: Shows most recent blog followed by list of older blogs
*/
// Fill the blogs array. Index 0 is the most recent blog
$blogs= get_blogs();
$blog = $blogs[0];
?>
<section>
	<!-- Post the most recent blog !-->
	<h2>Latest Blog</h2>
	<h3><a href="blog.php?blog=<?php echo $blog['id'];?>"><?php echo htmlentities($blog['blog_title'])?></a></h3>
	<div class="blog_subheading">
		<p>Submitted by <?php echo htmlentities(get_username($blog['username_id']))?> on <?php echo date('l\ F jS\,  Y (h:i:s A)',(int)$blog['blog_date']);?> </p>
	</div>
	<p><?php echo htmlentities($blog['blog_content'])?></p>

	<!-- Post previous blogs !-->
	<h2>Past Blogs</h2>
	<table>
		<tr>
			<th><h5>Blog Title</h5></th>
			<th><h5>Author</h5></th>
			<th><h5>Date</h5></th>
		</tr>
		<?php foreach ($blogs as $blog):?>
			<tr>
				<td><a href="blog.php?blog=<?php echo $blog['id'];?>"><?php echo htmlentities($blog['blog_title'])?></a></td>
				<td><?php echo htmlentities(get_username($blog['username_id']))?></td>
				<td><?php echo date('l\ F jS\,  Y (h:i:s A)',(int)$blog['blog_date']);?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<br>
	<p></p>
</section>
