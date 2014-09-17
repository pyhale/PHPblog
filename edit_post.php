<?php

include ('functions.php');

session_start();

check_valid_user();

do_html_header('Edit post');

$id = $_GET['id'];

$post = get_post_details($id);

post_edit_form($post);

do_html_url('blog/post.php?id='.$id, 'Discard');

do_html_url('blog', 'Home');

do_html_footer();
