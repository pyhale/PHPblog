<?php

include ('functions.php');

session_start();

check_valid_user();

$post_id = $_POST['post_id'];
$title = $_POST['title'];
$content = $_POST['content'];

do_html_header('Post comment');

$result = insert_comment($post_id, $title, $content);

if ($result) {
	echo "Post comment successfully!";
} else {
	echo "Fail to post your comment.";
}

do_html_url('blog/post.php?id='.$post_id, 'Back to post');

do_html_footer();
