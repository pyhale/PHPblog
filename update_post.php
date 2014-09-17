<?php

include ('functions.php');

session_start();

check_valid_user();

do_html_header('Update post');

$id = $_POST['id'];
$category = $_POST['category'];
$title = $_POST['title'];
$body = $_POST['body'];

$result = update_post($id, $title, $body, $category);

if ($result) {
	echo "Edit post successfully.";
	do_html_url('blog/post.php?id='.$id, 'Back to post');
} else {
	echo "Fail to edit post.";
	do_html_url('blog/edit_post?id='.$id, 'Try to edit again');
}

do_html_footer();
