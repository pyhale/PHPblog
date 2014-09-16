<?php

include ('functions.php');

session_start();

check_valid_user();

do_html_header('Delete post');

$id = $_GET['id'];

$result = del_post($id);

if ($result) {
	echo "Delete post successfully.";
} else {
	echo "Fail to delete post.";
}

do_html_url('blog', 'Back to Home');

do_html_footer();
