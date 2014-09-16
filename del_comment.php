<?php

include ('functions.php');

$id = $_GET['id'];

do_html_header('Delete comment');

$result = del_comment($id);

if ($result) {
	echo "Delete comment successfully.";
} else {
	echo "Fail to delete comment.";
}

do_html_url('blog', 'Back to home');

do_html_footer();
