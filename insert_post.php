<?php

include ('functions.php');

session_start();

check_valid_user();

do_html_header('Write Post');

$author_id = $_POST['author_id'];
$title = $_POST['title'];
$body = $_POST['body'];

$result = insert_post($author_id, $title, $body);

if ($result) {
	echo "Insert your post successfully.";
} else {
	echo "Fail to insert your post.";
}

do_html_url('blog', 'Back to Home');

do_html_footer();
