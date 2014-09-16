<?php

include ('functions.php');

session_start();

check_valid_user();

$postid = $_GET['id'];

$post = get_post_details($postid);

display_entry($post);

$comments = get_comments($postid);

display_comments($comments);

do_html_footer();
