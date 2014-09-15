<?php 

include ('functions.php');

session_start();

if (!isset($_SESSION['author'])) {
	header('Location:http://127.0.0.1/blog/login.php');
	exit;
}

do_html_header('Blog');

$_SESSION['author_id'] = get_authorid($_SESSION['author']);

$result = get_entries($_SESSION['author_id']);

display_entries($result);

do_html_footer();
