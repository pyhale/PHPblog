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
		<a href="#">delete</a>
		</li>
<?php
		echo "<hr>";
	}

	echo "</ol>";
}
