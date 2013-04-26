<?php
/*
	File Name: header.php
	Author Name: Paul Bialo
	Web Site Name: Blogging Site
	File Description: Header used throughout web site. "Required" at top of pages. Two different nav bars for if logged in or not.
*/  

	if (logged_in()): ?>
		<header> 
			<h1 id="mainheader">Paul's Blog Site</h1>          
			<nav>
				<a href="index.php" class="button">Home</a>
				<a href="edit_profile.php" class="button">Edit Profile</a>
				<a href="post_blog.php" class="button">New Blog</a>
				<a href="logout.php" class="button">Logout</a>
			</nav>
		</header>
	<?php	
	else:
		?>
		<header> 
			<h1 id="mainheader">Paul's Blog Site</h1>          
			<nav>
				<a href="index.php" class="button">Home</a>
				<a href="login.php" class="button">Login</a>
				<a href="register.php" class="button">Register</a>
			</nav>
		</header>
	<?php	
	endif;
