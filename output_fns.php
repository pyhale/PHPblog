<?php

function do_html_header($title='') {

?>

<html>
<head>
<title> <?php echo $title;?></title>
</head>
<body>

<?php

}

function do_html_footer() {

?>

</body>
</html>

<?php

}

function display_entries($result) {
	for ($i=0; $i<$result->num_rows; $i++) {
		$row = $result->fetch_assoc();
		echo "<a href=\"http://127.0.0.1/blog/post.php?id=".$row['id']."\"><h3>".$row['title']."</h3></a>";
		echo "<p>".$row['body']."</p>";
		echo "<a href=\"http://127.0.0.1/blog/del_post.php?id=".$row['id']."\">delete</a>";
		echo "<hr />";
	}
}

function display_entry($post) {
	do_html_header($post->title);
?>
	<h3><?php echo $post->title;?></h3>
	<p><?php echo $post->body;?></p>
<?php
	echo "<hr>";
}

function display_comments($comments) {

	if (!$comments->num_rows) {
		echo "<p>The post havn't comments yet. Be the first one!</p>";
	} else {

?>
	<p>Comments:</p>

	<ol>
<?php

		for ($i=0; $i<$comments->num_rows; $i++) {
			$row = $comments->fetch_assoc();
?>
			<li>
			<p><?php echo $row['title'];?></p>
			<p><?php echo $row['content'];?></p>
			<a href="<?php echo 'http://127.0.0.1/blog/del_comment.php?id='.$row['id'];?>">delete</a>
			</li>
<?php
			echo "<hr>";
		}

		echo "</ol>";
	}
}

function do_html_url($url, $title) {
	$url = "http://127.0.0.1/".$url;
?>
	<p><a href="<?php echo $url;?>"><?php echo $title;?></a></p>
<?php

}

function comments_post_form($postid) {

?>
	<p>Post comment</p>
	<form action="comment_post.php" method="post">
	<input type="hidden" name="post_id" value="<?php echo $postid;?>" />
	<input type="text" name="title" /><br>
	<textarea name="content" cols="45" row="5"></textarea><br>
	<input type="submit" value="submit" />
	</form>
<?php

}

function post_write_form($author_id) {

?>
	<p>Write Post</p>
	<form action="insert_post.php" method="post">
	<input type="hidden" name="author_id" value="<?php echo $author_id;?>" />
	<input type="text" name="title" /><br>
	<textarea name="body" cols="45" row="5"></textarea><br>
	<input type="submit" value="submit" />
	</form>
<?php

}
