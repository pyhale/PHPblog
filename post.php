<?php

include ('functions.php');

session_start();

check_valid_user();

$postid = $_GET['id'];

$post = get_post_details($postid);

display_entry($post);

$comments = get_comments($postid);

display_comments($comments);

comments_post_form($postid);

do_html_url('blog','Home');

do_html_footer();
