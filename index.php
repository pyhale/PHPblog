<?php 

include ('functions.php');

session_start();

check_valid_user();

do_html_header('Blog');

$_SESSION['author_id'] = get_authorid($_SESSION['author']);

$result = get_entries($_SESSION['author_id']);

display_entries($result);

do_html_footer();
