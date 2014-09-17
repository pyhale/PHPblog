<?php

include ('functions.php');

session_start();

check_valid_user();

$catid = $_GET['id'];

$catname = get_catname($catid);

do_html_header($catname);

$post = get_cate_post($catid);

display_entries($post);

do_html_url('blog', 'Home');

do_html_footer();
