<?php

function do_html_header($title='') {

?>

<html>
<head>
<title> <?php echo $title;?></title>
</head>
<body>

<?php

	if (isset($_SESSION['author'])) {

		$cate = get_category();

		display_category($cate);
	}

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
		echo "<a href=\"http://127.0.0.1/blog/edit_post.php?id=".$row['id']."\">edit</a><br>";
		echo "<a href=\"http://127.0.0.1/blog/del_post.php?id=".$row['id']."\">delete</a>";
		echo "<hr />";
	}
}

function display_entry($post) {
	do_html_header($post->title);
	$category = get_catname($post->category);
?>
	<h3><?php echo $post->title;?></h3>
	<a href="<?php echo 'http://127.0.0.1/blog/show_cat.php?id='.$post->category;?>"><p><?php echo $category;?></p></a>
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

	<ol id="comments">
<?php

		for ($i=0; $i<$comments->num_rows; $i++) {
			$row = $comments->fetch_assoc();
?>
			<li>
			<span style="visibility: hidden"><?php echo $row['id'];?></span>
			<p><?php echo $row['title'];?></p>
			<p><?php echo $row['content'];?></p>
			<a href="<?php echo 'http://127.0.0.1/blog/del_comment.php?id='.$row['id'];?>">delete</a>
			<span style="visibility: hidden"><?php echo $row['reply_to'];?></span>
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
	<form  name="comment" action="comment_post.php" method="post" onsubmit="postComment(); return false;">
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
	<select name="category" size="1">
		<option value="1">Life</option>
		<option value="2">Business</option>
		<option value="3">entertainment</option>
	</select><br>
	<textarea name="body" cols="45" row="5"></textarea><br>
	<input type="submit" value="submit" />
	</form>
<?php

}

function post_edit_form($post) {

?>
	<p>Edit Post</p>
	<form action="update_post.php" method="post">
	<input type="hidden" name="id" value="<?php echo $post->id;?>" />
	<input type="text" name="title" value="<?php echo $post->title;?>"/><br>
	<select name="category" size="1">
		<option value="1" <?php if ($post->category == 1) echo "select=\"selected\"";?>>Life</option>
		<option value="2" <?php if ($post->category == 2) echo "select=\"selected\"";?>>Business</option>
		<option value="3" <?php if ($post->category == 3) echo "select=\"selected\"";?>>entertainment</option>
	</select><br>
	<textarea name="body" cols="45" row="5"><?php echo $post->body;?></textarea><br>
	<input type="submit" value="submit" />
	</form>
<?php

}

function display_category($cate_array) {
	echo "<div style=\"float:right\">Category: ";
	foreach ($cate_array as $item) {
?>
	<a href="<?php echo "http://127.0.0.1/blog/show_cat.php?id=".$item['id'];?>"><?php echo $item['name'];?></a>
<?php
	}
	echo "</div>";

}
