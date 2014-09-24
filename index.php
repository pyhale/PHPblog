<?php 

include ('functions.php');

session_start();

check_valid_user();

do_html_header('Blog', array('ajax_functions.js'));

$_SESSION['author_id'] = get_authorid($_SESSION['author']);

$result = get_entries($_SESSION['author_id']);

display_entries($result);

do_html_url('blog/write_post.php', 'Write post');

do_html_url('blog/logout.php', 'logout');

do_html_footer();
